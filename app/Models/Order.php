<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $fillable = [ 'order_identity', 'session_id', 'stripe_transaction_id', 'gross_total', 'status' ];
}
