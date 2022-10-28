<?php

namespace App\Http\Controllers;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminkaController extends Controller
{
    public function adminka_index(){
        return view('/adminka/adminka_index');
    }
    public function add_user(){
        return view('/adminka/add_user');
    }
    public function execute_add_user(Request $request){
        $login = $request['login'];
        $pass = Hash::make($request['password']);

        $sql=DB::insert('insert into admin_users (login, password) values (?,?)',[$login,$pass]);
        if($sql) {
            return redirect(route('adminka_index'));
        }
    }
}
