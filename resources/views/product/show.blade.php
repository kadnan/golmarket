@extends('layout.master')
@section('content')
    <div class="row margin-top">
        <div class="col-md-11 col-md-offset-1">
            <div class="agileinfo_single">
                <h5>{!! $product->title !!}</h5>
                <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="{!! $product->image !!}" alt=" " class="img-responsive">
                </div>

                <div class="w3agile_description">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum.Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                    </p>
                </div>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4>${!! $product->discount_price !!} <span>${!! $product->original_price !!}</span></h4>
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="pulao basmati rice">
                                    <input type="hidden" name="amount" value="21.00">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@stop