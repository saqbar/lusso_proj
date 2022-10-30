<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    // на стр магазин показывает все категории
    public function shop_index(){
        //$categories=DB::select('select * from products');
        $categories = DB::select('select * from category_product');
        return view('shop/shop',['allcategory'=>$categories]);

    }
    // при выборе категории + передается в заголовке имя категории
    public function show_prod_of_categ($categ)
    {
        $poducts = DB::table('products')->select('*')->where('category', $categ)->get();
        return view('shop/show_prod_of_categ',['allproducts'=>$poducts]);
    }
    // при выборе товара + передается в заголовке id товара
    public function show_product($product){
        $poducts = DB::table('products')->select('*')->where('id_of_product', $product)->get();
        return view('shop/show_prod_of_categ',['product'=>$poducts]);
    }



}
