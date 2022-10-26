<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration_form(){
        return view('registration_form');
    }

}
