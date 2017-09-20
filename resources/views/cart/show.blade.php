@extends('layout.master')
@section('content')
    <div class="row margin-top">
        <div class="col-md-11 col-md-offset-1">
            <table class="table">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $qty = 0; ?>
                    <?php $price = 0; ?>
                    @foreach($entries as $entry)
                        <?php $price = $price + $entry->price; ?>
                        <tr>
                            <td>1</td>
                            <td>{!! $entry->product_name !!}</td>
                            <td>{!! $entry->price !!}</td>
                            <td>{!! $entry->qty !!}</td>
                            <td><a href="/delete/{!! $entry->id !!}">Delete</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right">
                           <strong>Total:</strong> {!! $price !!}
                            <a href="{!! route('order.checkout',$session_id) !!}" class="btn btn-primary">Checkout</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class='row margin-top'>
        <div class='col-md-4'>

        </div>
        <div class='col-md-4'>
            <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
            <script type="text/javascript">
                Stripe.setPublishableKey('pk_test_IMaDhnMGtBKgSG6Z1LtffIbC');
            </script>

            <form accept-charset="UTF-8" action="{!! route('order.checkout') !!}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_IMaDhnMGtBKgSG6Z1LtffIbC" id="payment-form" method="post">
                {!! csrf_field() !!}
                <div class='form-row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label>
                        <input class='form-control' size='4' type='text'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label>
                        <input data-stripe="number" autocomplete='off' class='form-control card-number' size='20' type='text'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input data-stripe="cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label>
                        <input data-stripe="exp_month" class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'> </label>
                        <input data-stripe="exp_year" class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-md-12'>
                        <div class='form-control total btn-success text-center'>
                            <input type="hidden" name="gross_total" value="{!! $price !!}">
                            Total:
                            <span class='amount'>${!! $price !!}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class='form-row margin-top'>
                            <div class='col-md-12 form-group'>
                                <button class='submit form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class='col-md-4'></div>
    </div>
@stop