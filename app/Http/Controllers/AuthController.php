<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth_form(){
        return view('auth_form');
    }
    public function execute_form_auth(){
        var_dump($_POST);

    }
}
