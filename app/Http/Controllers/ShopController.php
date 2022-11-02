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
        $products = DB::table('products')->select('*')->get();
        return view('shop/basket',['product'=>$products]);
    }
    public function order(Request $request){
        if (Auth::check()) {
        if ($request['order']==='true') {
            $products = DB::table('products')->select('*')->get();
            while ($id_prod = current($_COOKIE)) {
                if ($id_prod == 'product') {
                    foreach ($products as $product) {
                        if (key($_COOKIE) == $product->id_of_product) {
                            $my_user = Auth::user();
                            $name = $my_user->name;
                            $surname = $my_user->surname;
                            $telefon = $my_user->telefon;
                            $id_of_product = $product->id_of_product;
                            $name_of_prod = $product->name;
                            $volume_of_prod = $product->volume;
                            $price_of_prod = $product->price;
                            DB::insert('insert into orders (name, surname,telefon,id_of_product,name_of_prod,volume_of_prod,price_of_prod)
                                values (?,?,?,?,?,?,?)',[$name,$surname,$telefon,$id_of_product,$name_of_prod,$volume_of_prod,$price_of_prod]);
                            setcookie($product->id_of_product, 'product', time() - 10, '/');
                            echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0 1500px 0;'>
                                        Спасибо, в ближайшее время вашу заявку рассмотрят и перезвонят для подтверждения
                                  </h1>";
                            header( "refresh:3;url= /public/shop" );
                        }
                    }
                }
                next($_COOKIE);
            }
        }        } else {echo "<h1 id='message_about_reg' style='color: red; text-align: center; margin: 20% 0 1500px 0;'>
                    Пожалуйста зарегистрируйтесь или войдите в личный кабинет
              </h1>";}
    }
//
 }
