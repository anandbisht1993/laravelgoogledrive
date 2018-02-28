<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AdminControlller extends Controller
{
    //
	public function makeUrl(){

         $resuls = DB::table('flights')->first();
        return $resuls;

    }


}
