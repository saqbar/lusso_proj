<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;




class ShopController extends Controller
{
    // на стр магазин показывает все категории
    public function shop_index(){
        //$categories=DB::select('select * from products');
        $categories = DB::select('select * from category_product');
        return view('shop/shop',['allcategory'=>$categories]);

    }
    // при выборе категории + передается в заголовке имя категории
    public function show_prod_of_categ(Request $request)
    {   $categ = $request['category'];
        $poducts = DB::table('products')->select('*')->where('category', $categ)->get();
        return view('shop/show_prod_of_categ',['allproducts'=>$poducts]);
    }
    // при выборе товара + передается в заголовке id товара
    public function show_product(Request $request){
        $product = $request['id_of_product'];
        $poducts = DB::table('products')->select('*')->where('id_of_product', $product)->get();
        if(isset($request['id_prod'])){  //если нажали кнопку
            setcookie($request->id_of_product, 'product', time()+60*60,'/');
        }
        return view('shop/show_product',['prod'=>$poducts]);
    }
    // корзина товаров
    public function basket(Request $request){
        $del_cookie = $request['del_cookie'];
        if (isset($del_cookie)){
            setcookie($del_cookie, 'product', time() - 10, '/');
            header("Refresh: 0");
        }
        $poducts = DB::table('products')->select('*')->get();
        return view('shop/basket',['product'=>$poducts]);
    }
    public function comand_prod(){

        return view('tmp');


    }


}
