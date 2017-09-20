<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'orders', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'order_identity' )->default( '0' );
			$table->string( 'session_id' )->default( '0' );
			$table->string( 'stripe_transaction_id' );
			$table->float( 'gross_price' )->default( 0 );
			$table->tinyInteger( 'status' )->default( 0 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'orders' );
	}
}
