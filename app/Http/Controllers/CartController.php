<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		dd( session()->get( '_token' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function add( $product_id ) {
		// For Identification Purpose
		$session_id = session()->get( '_token' );
		// Get Product Detils by ID

		$product = Product::where( 'id', $product_id )->first();
		if ( $product == null ) {
			return abort( 404 );
		}

		if ( Cart::where( 'session_id', '=', $session_id )->exists() ) {

			//CHeck whether product exist if yes increase quantity
			$entry = Cart::where( [ 'session_id' => $session_id, 'product_id' => $product_id ] )->increment( 'qty', 1 );
			if ( ! $entry ) {
				Cart::create( [
					'session_id'   => $session_id,
					'product_id'   => $product_id,
					'product_name' => $product['title'],
					'price'        => $product['discount_price'],
					'qty'          => 1
				] );
			}
		} else {
			Cart::create( [
				'session_id'   => $session_id,
				'product_id'   => $product_id,
				'product_name' => $product['title'],
				'price'        => $product['discount_price'],
				'qty'          => 1
			] );
		}

		// First check whether the cart exist
		return redirect()->route( 'cart.show' );
	}

	public function show() {
		$session_id = session()->get( '_token' );
		$entries       = Cart::where( 'session_id', $session_id )->get();

		return view( 'cart/show' )
			->with( 'entries', $entries )
			->with( 'session_id', $session_id );
	}

}
