<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;


class OrderController extends Controller {
	public function checkout( Request $request ) {

		$session_id   = session()->get( '_token' );
		$order_number = substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyz" ), 0,
				4 ) . '-' . substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyz" ), 0,
				4 ) . '-' . substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyz" ), 0, 4 );
		$order_number = strtoupper( $order_number );

		$entries = Cart::where( [ 'session_id' => $session_id ] )->get();
		Stripe::setApiKey( config( 'services.stripe.secret' ) );
		$total = 0;
		foreach ( $entries as $entry ) {
			$total += floatval( $entry['price'] );
		}
		$gross_amount = intval( $total * 100 ); // to convert into cents;
		$charge       = Charge::create( [
			"amount"      => $gross_amount,
			"currency"    => "usd",
			'source'      => $request->get( 'stripeToken' ),
			"description" => 'For Order No:-' . $order_number
		] );

		//Successful Transaction Id
		$charge_id = $charge->id;
		//Proceed Db handlings
		if ( $charge_id != null ) {

			DB::beginTransaction();
			try {
				$order = Order::create( [
					'order_identity'        => $order_number,
					'session_id'            => $session_id,
					'stripe_transaction_id' => $charge_id,
					'gross_price'           => $gross_amount,
					'status'                => 1
				] );

				foreach ( $entries as $entry ) {
					OrderItem::create( [
						'order_identity' => $order_number,
						'order_id'       => $order->id,
						'product_id'     => $entry->product_id,
						'quantity'       => $entry->qty,
						'price'          => $entry->price,
					] );
				}
				//Reset Cart after order submission
				Cart::where( $session_id )->delete();
				DB::commit();

			} catch ( Exception  $ex ) {
				DB::rollBack();
				print_r( $ex->getMessage() );
			}

			return redirect( '/' );
		}

	}
}
