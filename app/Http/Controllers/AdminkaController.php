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
    public function edit_add_user(Request $request){
        if($request['update']){
            DB::table('admin_users')->where('id',$request['id'])->update(['login'=>$request['login']]);
            return redirect(route('add_user'));
        }
        if($request['delete']){
            DB::table('admin_users')->where('id', $request['id'])->delete();
            return redirect(route('add_user'));
        }
    }
    public function show_reg_usr(){
        return view('adminka/adminka_show_reg_usr');
    }
    public function edit_reg_usr(Request $request){
        if($request['update']){
            DB::table('users')->where('id',$request['id'])->update([
                'name'=>$request['name'],
                'surname'=>$request['surname'],
                'login'=>$request['login'],
                'telefon'=>$request['telefon'],
            ]);
            return redirect(route('adminka_show_reg_usr'));
        }
        if($request['delete']){
            DB::table('users')->where('id', $request['id'])->delete();
            return redirect(route('adminka_show_reg_usr'));
        }
    }




}
