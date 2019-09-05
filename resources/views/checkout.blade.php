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

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}

                    <h2>Shipping Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="shipping_name">Name</label>
                        <input type="text" class="form-control" id="shipping_name" name="shipping_name" value="{{ old('shipping_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gst_number">GST Number <small>(Optional)</small></label>
                        <input type="text" class="form-control" id="gst_number" name="gst_number" value="">
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">Address</label>
                        <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="shipping_city">City</label>
                            <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="{{ old('shipping_city') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_province">State/Province</label>
                            <input type="text" class="form-control" id="shipping_province" name="shipping_province" value="{{ old('shipping_province') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="shipping_postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="shipping_postalcode" name="shipping_postalcode" value="{{ old('shipping_postalcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_phone">Phone</label>
                            <input type="text" class="form-control" id="shipping_phone" name="shipping_phone" value="{{ old('shipping_phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <input id="cash_on_delivery_submit" name="cash_on_delivery_submit" class="button-primary full-width" type="submit" value="Cash on Delivery">

                    @if(false)
                    <div class="mt-32">or</div>

                    <div class="mt-32">

                        <h2>Payment Details</h2>

                        <div>
                            <input type="checkbox" class="" id="billing_shipping_check" name="billing_shipping_check" onclick="SetBilling(this.checked);" @if(!request()->has('billing_shipping_check') || old('billing_shipping_check')) checked="checked" @endif required> Is your billing address same as your shipping address?
                        </div>

                        <div class="spacer"></div>

                        <div class="billing-details-container" style="display:none">
                            <h2>Billing Details</h2>

                            <div class="form-group">
                                <label for="billing_name">Name</label>
                                <input type="text" class="form-control" id="billing_name" name="billing_name" value="{{ old('billing_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="billing_address">Address</label>
                                <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ old('billing_address') }}">
                            </div>

                            <div class="half-form">
                                <div class="form-group">
                                    <label for="billing_city">City</label>
                                    <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ old('billing_city') }}">
                                </div>
                                <div class="form-group">
                                    <label for="billing_province">State/Province</label>
                                    <input type="text" class="form-control" id="billing_province" name="billing_province" value="{{ old('billing_province') }}">
                                </div>
                            </div> <!-- end half-form -->

                            <div class="half-form">
                                <div class="form-group">
                                    <label for="billing_postalcode">Postal Code</label>
                                    <input type="text" class="form-control" id="billing_postalcode" name="billing_postalcode" value="{{ old('billing_postalcode') }}">
                                </div>
                                <div class="form-group">
                                    <label for="billing_phone">Phone</label>
                                    <input type="text" class="form-control" id="billing_phone" name="billing_phone" value="{{ old('billing_phone') }}">
                                </div>
                            </div> <!-- end half-form -->
                        </div>

                        <div class="form-group">
                            <label for="name_on_card">Name on Card</label>
                            <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                        </div>

                        <div class="form-group">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="spacer"></div>

                        <input type="submit" id="complete_order" name="complete_order" class="button-primary full-width" value="Complete Order">
                    </div>
                    @endif
                </form>

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
                <h2>Your Order</h2>

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
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        @if(config('cart.tax') > 0) {{ presentPrice($newTax) }} <br> @endif
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_JKVJPMynL8ckk7ivBxoroTlT');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            /*var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete_order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete_order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });*/

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }

            // PayPal Stuff
            var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ isset($paypalToken) ? $paypalToken : '' }}";

            braintree.dropin.create({
              authorization: client_token,
              selector: '#bt-dropin',
              paypal: {
                flow: 'vault'
              }
            }, function (createErr, instance) {
              if (createErr) {
                console.log('Create Error', createErr);
                return;
              }

              // remove credit card option
              var elem = document.querySelector('.braintree-option__card');
              elem.parentNode.removeChild(elem);

              form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                  if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                  }

                  // Add the nonce to the form and submit
                  document.querySelector('#nonce').value = payload.nonce;
                  form.submit();
                });
              });
            });

        })();

        function SetBilling(checked) {
            if (checked) {
                $('.billing-details-container').hide();
                document.getElementById('billing_name').value = document.getElementById('name').value;
                document.getElementById('billing_address').value = document.getElementById('address').value;
                document.getElementById('billing_city').value = document.getElementById('city').value;
                document.getElementById('billing_province').value = document.getElementById('province').value;
                document.getElementById('billing_postalcode').value = document.getElementById('postalcode').value;
                document.getElementById('billing_phone').value = document.getElementById('phone').value;
            } else {
                $('.billing-details-container').show();
                document.getElementById('billing_name').value = '';
                document.getElementById('billing_address').value = '';
                document.getElementById('billing_city').value = '';
                document.getElementById('billing_province').value = '';
                document.getElementById('billing_postalcode').value = '';
                document.getElementById('billing_phone').value = '';
            }
        }
    </script>
@endsection
