<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth_form(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('auth_form');
    }
    public function execute_form_auth(Request $request){
        $formFields= $request->only(['login','password']);    // получаем по ключам значения из Request
        if(Auth::attempt($formFields)){                      //
            return redirect(route('home'));
        }
        echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0 1500px 0;'>
                    Логин или пароль не правильные
              </h1>";
        header( "refresh:3;url= /public/auth" );
    }
    public function logout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
