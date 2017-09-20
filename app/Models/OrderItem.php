<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
	protected $fillable = [ 'order_identity', 'order_id', 'product_id', 'price' ];
}
