<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shop_index(){
        //$categories=DB::select('select * from products');
        return view('shop');
    }
}
