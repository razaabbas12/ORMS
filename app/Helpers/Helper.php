<?php

namespace App\Helpers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use App\User;
use App\Models\Product;
use App\Models\Train;
use App\Models\City;
// use App\Models\User;


class Helper
{

    public static function userIdToName($id)
    {
        $name = Train::where('id',$id)->value('name');
        return $name;
    }
    public static function cityToName($id)
    {
        \Log::info("==============================================================");
        $name = City::where('id',$id)->value('name');
        return $name;
    }

	public static function customerIdToName($id)
    {
        $name = User::where('id',$id)->value('name');
        return $name;
    }
    public static function productIdToName($id)
    {
        $name = Product::where('id',$id)->value('name');
        return $name;
    }


}

