@extends('layout.master')
@section('content')
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="w3l_banner_nav_right_banner">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner1">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner2">
                        <h3>upto <i>50%</i> off.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- banner -->
    <div class="banner_bottom">
        <div class="wthree_banner_bottom_left_grid_sub">
        </div>
        <div class="wthree_banner_bottom_left_grid_sub1">
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    <img src="{!! asset('images/4.jpg') !!}" alt=" " class="img-responsive" />
                    <div class="wthree_banner_bottom_left_grid_pos">
                        <h4>Discount Offer <span>25%</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    <img src="images/5.jpg" alt=" " class="img-responsive" />
                    <div class="wthree_banner_btm_pos">
                        <h3>introducing <span>best store</span> for <i>groceries</i></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wthree_banner_bottom_left">
                <div class="wthree_banner_bottom_left_grid">
                    <img src="images/6.jpg" alt=" " class="img-responsive" />
                    <div class="wthree_banner_btm_pos1">
                        <h3>Save <span>Upto</span> $10</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="top-brands">
        <div class="container">
            <h3>Hot Offers</h3>
            <div class="agile_top_brands_grids">
                @foreach($hot_products as $hot_product)
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="{!! route('product.show',$hot_product->id) !!}"><img width="150" height="150" title=" " alt=" " src="{!! $hot_product->image !!}" /></a>
                                                <p>{!! $hot_product->title !!}</p>
                                                <h4>${!! $hot_product->discount_price !!} <span>${!! $hot_product->original_price !!}</span></h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <a class="btn btn-primary" href="{!! route('cart.add',$hot_product->id) !!}">Add to Cart</a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="top-brands">
        <div class="container">
            <h3>Top Products</h3>
            <div class="agile_top_brands_grids">
                @foreach($top_products  as $top_product)
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="{!! route('product.show',$hot_product->id) !!}"><img width="150" height="150" title=" " alt=" " src="{!! $top_product->image !!}" /></a>
                                                <p>{!! $top_product->title !!}</p>
                                                <h4>${!! $top_product->discount_price !!} <span>${!! $top_product->original_price !!}</span></h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <a class="btn btn-primary" href="{!! route('cart.add',$top_product->id) !!}">Add to Cart</a>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@stop