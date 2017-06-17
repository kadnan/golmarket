<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$categories = [ 'Branded Foods', 'Households', 'Veggies & Fruits', 'Kitchen', 'Bread & Bakery' ];
		foreach ( $categories as $category ) {
			# First fetch category Id
			$category        = DB::table( 'categories' )->where( 'name', '=', trim( strtolower( $category ) ) )->get();
			$category_id     = $category[0]->id;
			$actual_price    = rand( 15.5, 100.5 );
			$discount_factor = ( 10 / 100 ) * $actual_price; // 10% of actual price
			$discount_price  = $actual_price - $discount_factor;

			DB::table( 'products' )->insert( [
				'title'          => strtolower( 'Product for ' . $category[0]->name ),
				'image'          => 'http://via.placeholder.com/600x400',
				'category_id'    => $category_id,
				'original_price' => $actual_price,
				'discount_price' => $discount_price,
				'in_stock'       => 1,
				'status'         => 1,
				'created_at'     => Carbon::now(),
			] );

		}
	}
}
