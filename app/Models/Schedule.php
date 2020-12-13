<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    	protected $fillable = [
		'train_id',
		'city_id',
		'arrival',
		'departure'
	];

    public $table = "scheduling";
}
