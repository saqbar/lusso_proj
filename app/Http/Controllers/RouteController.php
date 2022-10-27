<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('tmp');
    }

}
