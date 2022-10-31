<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function contacts(){
        return view('contacts');
    }
    public function private_page(){
        return view('private_page ');
    }
    public function tmp(){
        $user = Auth::user();
        if($user['login']=='admin'){return view('shop/shop_tmp');}
    }

    public function my_account(){
        return view('my_account');
    }
}
