<?php


Route::get( '/', 'HomeController@index' );
Route::resource( 'product', 'ProductController' );
