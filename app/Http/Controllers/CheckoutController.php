<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use App\Transaction;
use Appnings\Payment\Facades\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        /*$gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $paypalToken = $gateway->ClientToken()->generate();*/

        return view('checkout')->with([
            //'paypalToken' => $paypalToken,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        $isOrderCOD = true;

        try {
            if($request->has('complete_order') && $request->get('complete_order') === "Complete Order") {
                $charge = Stripe::charges()->create([
                    'amount' => getNumbers()->get('newTotal') / 100,
                    'currency' => 'CAD',
                    'source' => $request->stripeToken,
                    'description' => 'Order',
                    'receipt_email' => $request->email,
                    'metadata' => [
                        'contents' => $contents,
                        'quantity' => Cart::instance('default')->count(),
                        'discount' => collect(session()->get('coupon'))->toJson(),
                    ],
                ]);
                $isOrderCOD = false;
            }

            $order = $this->addToOrdersTables($request, $isOrderCOD, null);
            Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $isOrderCOD, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function ccavenueCheckout(Request $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }

        $tmpOrder = $this->addTempOrderToOrdersTablesCCAvenue();

        if($tmpOrder) {
            $parameters = [
                'tid' => Carbon::now()->getTimestamp(),
                'order_id' => $tmpOrder->id,
                'amount' => $tmpOrder->billing_total,
            ];

            $order = Payment::prepare($parameters);
            return Payment::process($order);
        } else {
            return back()->withErrors('Sorry! We encountered an issue processing your order. Please try again later or contact support.');
        }
    }

    public function ccavenueProcess(Request $request) {

        // For default Gateway
        $response = Payment::response($request);
        if ($response && is_array($response)) {

            $transaction = Transaction::create($response);

            if ($response['order_status'] == "Success") {
                list($success, $order, $message) = $this->updateOrderInOrdersTablesCCAvenue(
                    $response,
                    null
                );

                if($success) {
                    Mail::send(new OrderPlaced($order));

                    // decrease the quantities of all the products in the cart
                    $this->decreaseQuantities();

                    Cart::instance('default')->destroy();
                    session()->forget('coupon');

                    return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
                } else {
                    return redirect()->route('confirmation.index')->with('error_message', 'An internal error occurred with the message: '.$message.', Tracking ID: '.$response['tracking_id'].', Bank Ref No: '.$response['bank_ref_no']);
                }

            } else {
                list($success, $order, $message) = $this->updateOrderInOrdersTablesCCAvenue(
                    $response,
                    $response['failure_message']
                );
                return redirect()->route('confirmation.index')->with('error_message', 'An error occurred while attempting to process payment with the message: '.$response['failure_message'].', Tracking ID: '.$response['tracking_id'].', Bank Ref No: '.$response['bank_ref_no']);
            }
        } else {
            //This is a serious problem. Ideally, this else should never be executed
            return redirect()->route('confirmation.index')->with('error_message', "Woah Woah Woah! How'd you end up here? Call me and tell me what you did exactly!");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paypalCheckout(Request $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => round(getNumbers()->get('newTotal') / 100, 2),
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $transaction = $result->transaction;

        if ($result->success) {
            $order = $this->addToOrdersTablesPaypal(
                $request,
                $transaction->paypal['payerEmail'],
                $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                null
            );

            Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } else {
            $order = $this->addToOrdersTablesPaypal(
                $request,
                $transaction->paypal['payerEmail'],
                $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                $result->message
            );

            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }

    protected function addToOrdersTables($request, $isOrderCOD, $error = null)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->billing_name,
            'gst_number' => $request->gst_number,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_province' => $request->billing_province,
            'billing_postalcode' => $request->billing_postalcode,
            'billing_phone' => $request->billing_phone,
            'shipping_name' => (!$request->has('billing_shipping_check')) ? $request->shipping_name : $request->billing_name,
            'shipping_address' => (!$request->has('billing_shipping_check')) ? $request->shipping_address : $request->billing_address,
            'shipping_city' => (!$request->has('billing_shipping_check')) ? $request->shipping_city : $request->billing_city,
            'shipping_province' => (!$request->has('billing_shipping_check')) ? $request->shipping_province : $request->billing_province,
            'shipping_postalcode' => (!$request->has('billing_shipping_check')) ? $request->shipping_postalcode : $request->billing_postalcode,
            'shipping_phone' => (!$request->has('billing_shipping_check')) ? $request->shipping_phone : $request->billing_phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'payment_gateway' => ($isOrderCOD) ? 'COD' : 'stripe',
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function addToOrdersTablesPaypal($request, $email, $name, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $email,
            'billing_name' => $name,
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_province' => $request->shipping_province,
            'shipping_postalcode' => $request->shipping_postalcode,
            'shipping_phone' => $request->shipping_phone,
            'gst_number' => $request->gst_number,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
            'payment_gateway' => 'paypal',
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function addTempOrderToOrdersTablesCCAvenue()
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'payment_gateway' => 'ccavenue',
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function updateOrderInOrdersTablesCCAvenue($response, $error = null)
    {
        $tmpOrder = Order::find($response['order_id']);
        if($tmpOrder) {
            $result = $tmpOrder->update([
                'billing_email' => $response['billing_email'],
                'billing_name' => $response['billing_name'],
                //'gst_number' => $request->gst_number,
                'billing_address' => $response['billing_address'],
                'billing_city' => $response['billing_city'],
                'billing_province' => $response['billing_state'],
                'billing_postalcode' => $response['billing_zip'],
                'billing_phone' => $response['billing_tel'],
                'shipping_name' => $response['delivery_name'],
                'shipping_address' => $response['delivery_address'],
                'shipping_city' => $response['delivery_city'],
                'shipping_province' => $response['delivery_state'],
                'shipping_postalcode' => $response['delivery_zip'],
                'shipping_phone' => $response['delivery_tel'],
                'billing_name_on_card' => $response['card_name'],
                'payment_gateway' => 'CCAvenue ('.$response['payment_mode'].')',
                'error' => $error,
            ]);

            // Insert into order_product table
            foreach (Cart::content() as $item) {
                OrderProduct::create([
                    'order_id' => $response['order_id'],
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                ]);
            }

            if ($result) {
                return [
                    'success' => true,
                    'order' => $tmpOrder,
                    'message' => 'Order updated successfully!'
                ];
            }
        }

        return [
            'success' => false,
            'order' => null,
            'message' => 'Unable to find order #'.$response['order_id'].'. Please contact customer support for help.'
        ];
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
