<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'hot_products', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'product_id' )->unsigned();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign( 'product_id' )
			      ->references( 'id' )->on( 'products' )
			      ->onDelete( 'cascade' )
			      ->onUpdate( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'hot_products' );
	}
}
