@extends('frontend.master')

@section('mainSection')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>Checkout</h3>
            <h4><a href="index.html">Home</a><label>/</label>Checkout</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="container text-left mt-5" style="margin-top: 40px">
        @if (\Session::has('success_message'))
            <div class="alert alert-success">
                {!! \Session::get('success_message') !!}

            </div>
        @endif
        @if (\Session::has('danger_message'))
            <div class="alert alert-success">
                {!! \Session::get('danger_message') !!}
            </div>
        @endif
    </div>

    <!-- contact -->
    <div class="check-out">
        <div class="container">

            <div class="spec ">
                <h3>Checkout</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form role="form" action="{{ url('stripe') }}" method="post" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Mobile</label>
                            <input type="text" class="form-control" id="name" name="mobile" placeholder="Enter Mobile">
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" id="name" name="address" placeholder="Enter Address">
                        </div>


                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                    type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input autocomplete='off'
                                    class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <table class="table ">
                        <tr>

                            <th class="t-head head-it ">Products</th>
                            <th class="t-head">Price</th>
                            <th class="t-head">Quantity</th>
                            <th class="t-head">Total</th>

                        </tr>
                        @forelse ($cartItems as $cartItem)
                            @php
                                $product = App\Models\Product::find($cartItem->id);
                            @endphp
                            <tr>

                                <td class="">

                                    <h5>{{ $product->name }}</h5>

                                </td>
                                <td class="t-data">{{ $cartItem->price }}</td>
                                <td class="t-data">
                                    {{ $cartItem->quantity }}

                                </td>
                                <td class="t-data">{{ $cartItem->price * $cartItem->quantity }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <h3>No Product Found</h3>
                                </td>
                            </tr>
                        @endforelse
                        <tr>

                            <th class="t-head head-it "></th>
                            <th class="t-head"></th>
                            <th class="t-head">Grand Total</th>
                            <th class="t-head">{{ \Cart::getTotal() }}</th>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            $(function() {
                var $form = $(".require-validation");
                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'
                        ].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
                    $errorMessage.addClass('hide');
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        var $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                        }
                    });
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                });

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        /* token contains id, last4, and card type */
                        var token = response['id'];
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            });
        </script>
    @endsection
