<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration_form(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration_form');
    }
    public function execute_form_reg(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }
        $validateFields = $request->validate([
            'name'=>'required|alpha|min:3|max:10',   //поле не должно быть пустым и должно состоять только из букв
            'surname'=>'required|alpha|min:3|max:10',   // минимум 3 символа, максимум 10
            'login' => 'required|min:3|max:10',
            'password' => 'required|min:5|max:17',
        ]);
     if(User::where('login',$validateFields['login'])->exists()){
         echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0 1500px 0;'>
                    Такой пользователь уже существует
              </h1>";
         header( "refresh:3;url= /public/registration" );

     }
        $myUser=User::create($validateFields);
        if($myUser){
            Auth::login($myUser);
            return redirect(route('private_page'));
        }
        return redirect(route('registration_form'))->withErrors([
            'formError'=>'ошибка при сохранении польз.']);
    }
}
