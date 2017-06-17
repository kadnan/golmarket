<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$categories = [ 'Branded Foods', 'Households', 'Veggies & Fruits', 'Kitchen', 'Bread & Bakery' ];
		foreach ( $categories as $category ) {
			DB::table( 'categories' )->insert( [
				'name'       => trim( strtolower( $category ) ),
				'status'     => 1,
				'created_at' => Carbon::now(),
			] );
		}

	}
}
