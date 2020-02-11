@extends('layout')

@section('title', 'Checkout')

@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading txt-gold">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}

                    <h2 class="txt-gold">Billing Details</h2>

                    <div class="form-group">
                        <label class="light-text-color" for="email">Email Address</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="light-text-color" for="billing_name">Name</label>
                        <input type="text" class="form-control" id="billing_name" name="billing_name" value="{{ old('billing_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="light-text-color" for="gst_number">GST Number <small>(Optional)</small></label>
                        <input type="text" class="form-control" id="gst_number" name="gst_number" value="{{ old('gst_number') }}">
                    </div>
                    <div class="form-group">
                        <label class="light-text-color" for="billing_address">Address</label>
                        <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ old('billing_address') }}" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label class="light-text-color" for="billing_city">City</label>
                            <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ old('billing_city') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="light-text-color" for="billing_province">State/Province</label>
                            <input type="text" class="form-control" id="billing_province" name="billing_province" value="{{ old('billing_province') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label class="light-text-color" for="billing_postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="billing_postalcode" name="billing_postalcode" value="{{ old('billing_postalcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="light-text-color" for="billing_phone">Phone</label>
                            <input type="text" class="form-control" id="billing_phone" name="billing_phone" value="{{ old('billing_phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="mt-32">

                        <div>
                            <input type="checkbox" class="" id="billing_shipping_check" name="billing_shipping_check" onclick="SetBilling(this.checked);" @if(!request()->has('billing_shipping_check') || old('billing_shipping_check')) checked="checked" @endif> <label class="light-text-color">Is your billing address same as your shipping address?</label>
                        </div>

                        <div class="spacer"></div>

                        <!-- SHIPPING DETAILS GO HERE -->
                        <div class="shipping-details-container" style="display:none">

                            <h2 class="txt-gold">Shipping Details</h2>

                            <div class="form-group">
                                <label class="light-text-color" for="shipping_name">Name</label>
                                <input type="text" class="form-control" id="shipping_name" name="shipping_name" value="{{ old('shipping_name') }}">
                            </div>

                            <div class="form-group">
                                <label class="light-text-color" for="shipping_address">Address</label>
                                <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}">
                            </div>

                            <div class="half-form">
                                <div class="form-group">
                                    <label class="light-text-color" for="shipping_city">City</label>
                                    <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="{{ old('shipping_city') }}">
                                </div>
                                <div class="form-group">
                                    <label class="light-text-color" for="shipping_province">State/Province</label>
                                    <input type="text" class="form-control" id="shipping_province" name="shipping_province" value="{{ old('shipping_province') }}">
                                </div>
                            </div> <!-- end half-form -->

                            <div class="half-form">
                                <div class="form-group">
                                    <label class="light-text-color" for="shipping_postalcode">Postal Code</label>
                                    <input type="text" class="form-control" id="shipping_postalcode" name="shipping_postalcode" value="{{ old('shipping_postalcode') }}">
                                </div>
                                <div class="form-group">
                                    <label class="light-text-color" for="shipping_phone">Phone</label>
                                    <input type="text" class="form-control" id="shipping_phone" name="shipping_phone" value="{{ old('shipping_phone') }}">
                                </div>
                            </div> <!-- end half-form -->
                        </div>

                        <input id="cash_on_delivery_submit" name="cash_on_delivery_submit" class="button full-width" type="submit" value="Cash on Delivery">
                    </div>
                </form>

                <div class="mt-32 light-text-color">or</div>
                <div class="mt-32">
                    {{--<h2>Pay with Debit/Credit Card</h2>--}}

                    <form method="post" id="cc-payment-form" action="{{ route('checkout.ccavenue') }}">
                        @csrf
                        <section>
                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>

                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="button full-width" type="submit"><span>Pay with Debit/Credit Card</span></button>
                    </form>
                </div>

                @if(false)
                <div class="mt-32">or</div>
                <div class="mt-32">
                    <h2>Pay with PayPal</h2>

                    <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                        @csrf
                        <section>
                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>

                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
                    </form>
                </div>
                @endif
            </div>



            <div class="checkout-table-container">
                <h2 class="txt-gold">Your Order</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif
                        @if(config('cart.tax') > 0) Tax ({{config('cart.tax')}}%)<br> @endif
                        <span class="checkout-totals-total txt-gold">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        @if(config('cart.tax') > 0) {{ presentPrice($newTax) }} <br> @endif
                        <span class="checkout-totals-total txt-gold">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script>
        function SetBilling(checked) {
            if (checked) {
                $('.shipping-details-container').hide();
            } else {
                $('.shipping-details-container').show();
                document.getElementById('shipping_name').value = '';
                document.getElementById('shipping_address').value = '';
                document.getElementById('shipping_city').value = '';
                document.getElementById('shipping_province').value = '';
                document.getElementById('shipping_postalcode').value = '';
                document.getElementById('shipping_phone').value = '';
            }
        }
    </script>
@endsection
