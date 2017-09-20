<?php


Route::get( '/', 'HomeController@index' );
Route::resource( 'product', 'ProductController' );
Route::get( 'cart/add/{product_id}', 'CartController@add' )->name('cart.add');
Route::get( 'cart/', 'CartController@index' );
Route::get( 'cart/show', 'CartController@show' )->name('cart.show');
Route::post( 'order/checkout', 'OrderController@checkout' )->name( 'order.checkout' );
