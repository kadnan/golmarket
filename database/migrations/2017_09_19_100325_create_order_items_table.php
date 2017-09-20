<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create( 'order_items', function ( Blueprint $table ) {
		    $table->increments( 'id' );
		    $table->string( 'order_identity' )->default( '0' );
		    $table->integer('order_id')->unsigned()->default( '0' );
		    $table->integer('product_id')->unsigned()->default( '0' );
		    $table->float('price')->default( '0' );
		    $table->timestamps();

		    $table->foreign('order_id')->references('id')->on('orders');
	    } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists( 'order_items' );
    }
}
