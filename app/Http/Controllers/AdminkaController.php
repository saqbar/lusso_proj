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
    ///
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
///////////////////////////////////////////////////////////////////////////////////////////
//    // Все товары
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
///////////////////////////////////////////////////////////////////////////////////////////
/// Заказы
    public function show_orders(Request $request){
        Gate::authorize('if_admin');
        if($request['update']){
            DB::table('orders')->where('id',$request['id'])->update([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'telefon' => $request['telefon'],
                'id_of_product' => $request['id_of_product'],
                'name_of_prod' => $request['name_of_prod'],
                'volume_of_prod' => $request['volume_of_prod'],
                'price_of_prod' => $request['price_of_prod'],
                ]);
        }
        elseif ($request['delete']){
            DB::table('orders')->where('id', $request['id'])->delete();
            return redirect(route('show_orders'));
        }
        else {
            $orders = DB::select('select * from orders');
            return view('adminka/show_orders', ['orders' => $orders]);
        }
    }
///////////////////////////////////////////////////////////////////////////////////////////
/// Фильтры
/// вход на страничку добавления
    public function add_filters(){
        Gate::authorize('if_admin');
        $filters_category = DB::select('select * from filters_category');
        $filters_one_to_many_category = DB::select('select * from filters_one_to_many_category');
        return view('adminka/filters_one_to_many_category',
            ['filters_category'=>$filters_category, 'filters_one_to_many_category'=>$filters_one_to_many_category]);
    }
    //  добавление разделов фильтра
    public function execute_add_filters(Request $request){
        $name_categ_filt = $request['name_categ_filt'];
        DB::insert('insert into filters_category (name_categ_filt)values (?)',[$name_categ_filt]);
        return redirect(route('add_filters'));
    }
    // добавление подразделов фильтра
    public function execute_one_to_many_filters(Request $request){
        $name_categ_filt = $request['name_categ_filt'];
        $name_one_categ = $request['name_one_categ'];
        DB::insert('insert into filters_one_to_many_category (name_categ_filt,name_one_categ)values (?,?)',[$name_categ_filt,$name_one_categ]);
        return redirect(route('add_filters'));
    }
    // список всех категорий фильтров
    public function execute_show_one_to_many_filters(Request $request){
        if($request['update']){
            DB::table('filters_one_to_many_category')->where('id',$request['id'])->update([
                'name_categ_filt' => $request['name_categ_filt'],
                'name_one_categ'=>$request['name_one_categ']
            ]);
            return redirect(route('add_filters'));
        }
        elseif ($request['delete']){
            DB::table('filters_one_to_many_category')->where('id', $request['id'])->delete();
            return redirect(route('add_filters'));
        }
        elseif ($request['update_flt']){
            DB::table('filters_category')->where('id',$request['id'])->update([
                'name_categ_filt' => $request['name_categ_filt'],
            ]);
            return redirect(route('add_filters'));
        }
        elseif ($request['delete_flt']){
            DB::table('filters_category')->where('id', $request['id'])->delete();
            return redirect(route('add_filters'));
        }


    }




}
