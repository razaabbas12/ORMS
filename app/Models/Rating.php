<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = "rating";
	protected $fillable = [
		'customer_id',
		'tailor_id',
		'rating',
		'review',
	];
}
