<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
	protected $fillable = [
		'name',
		'base_price',
		'no_of_seats'
	];

    public $table = "train";
}
