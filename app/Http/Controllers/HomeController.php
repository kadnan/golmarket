<?php

namespace App\Http\Controllers;

use App\Models\HotProduct;
use App\Models\TopProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index() {

		$hot_products = HotProduct::join('products','products.id','=','product_id')->get();
		$top_products = TopProduct::join('products','products.id','=','product_id')->get();
		return view('index')
			->with('hot_products',$hot_products)
			->with('top_products',$top_products);
    }
}
