<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
		'customer_id',
		'train_id',
		'from',
		'to',
		'book_seats',
		'fare',
	];

    public $table = "booking";
}
