<?php

namespace App\Http\Controllers;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminkaController extends Controller
{
    public function adminka_index(){
        Gate::authorize('if_admin');
        return view('/adminka/adminka_index');
    }
    public function add_user(){
        Gate::authorize('if_admin');
        return view('/adminka/add_user');
    }
    public function execute_add_user(Request $request){
        Gate::authorize('if_admin');
        $login = $request['login'];
        $pass = Hash::make($request['password']);

        $sql=DB::insert('insert into admin_users (login, password) values (?,?)',[$login,$pass]);
        if($sql) {
            return redirect(route('adminka_index'));
        }
    }
    public function edit_add_user(Request $request){
        Gate::authorize('if_admin');
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
        Gate::authorize('if_admin');
        return view('adminka/adminka_show_reg_usr');
    }
    public function edit_reg_usr(Request $request){
        Gate::authorize('if_admin');
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
    ///////////////////////////////////////////////////////////////////////////////////////////
    public function add_shop_category_product(){
        Gate::authorize('if_admin');
        return view('adminka/add_shop_category_product');
    }
    public function execute_add_shop_category_product(Request $request){
        Gate::authorize('if_admin');
        $name = $request['name'];
        DB::insert('insert into category_product (name) values (?)',[$name]);
        return redirect(route('add_shop_category_product'));
    }
    public function execute_edit_shop_category_product(Request $request){
        Gate::authorize('if_admin');
        if($request['update']){
            DB::table('category_product')->where('id',$request['id'])->update([
                'name'=>$request['name'],
            ]);
            return redirect(route('add_shop_category_product'));
        }
        if($request['delete']){
            DB::table('category_product')->where('id', $request['id'])->delete();
            return redirect(route('add_shop_category_product'));
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////
// добавить продукцию
    public function add_shop_product(){

        Gate::authorize('if_admin');
        $categories = DB::select('select * from category_product');
        return view('adminka/add_shop_product',['allcategory'=>$categories]);
    }
    public function execute_add_shop_product(Request $request){
        Gate::authorize('if_admin');
        $category = $request['category'];
        $id_of_product = $request['id_of_product'];
        $name = $request['name'];
        $volume = $request['volume'];
        $price = $request['price'];
        $description = $request['description'];
        $sql=DB::insert('insert into products (category, id_of_product,name,volume,price,description)
                                values (?,?,?,?,?,?)',[$category,$id_of_product,$name,$volume,$price,$description]);
        return redirect(route('add_shop_product'));
    }
    // Все товары
    public function show_all_product(){
        Gate::authorize('if_admin');
        return view('adminka/show_all_product');
    }
    public function edit_all_product(Request $request){
        Gate::authorize('if_admin');
        if($request['update']){
            DB::table('products')->where('id',$request['id'])->update([
                'category' => $request['category'],
                'id_of_product' => $request['id_of_product'],
                'name' => $request['name'],
                'volume' => $request['volume'],
                'price' => $request['price'],
                'description' => $request['description'],
            ]);
            return redirect(route('show_all_product'));
        }
        if($request['delete']){
            DB::table('products')->where('id', $request['id'])->delete();
            return redirect(route('show_all_product'));
        }
    }



}
