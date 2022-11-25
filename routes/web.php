<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminkaController;

use Illuminate\Http\Request;

//Route::controller(RouteController::class)->group(function (){
//
//});
Route::get('/', [RouteController::class,'index'])->name('home');
Route::get('/about',[RouteController::class,'about'])->name('about');
Route::get('/contacts',[RouteController::class,'contacts'])->name('contacts');
Route::get('/account',[RouteController::class,'my_account'])->name('my_account')->middleware('auth');
///////////////////////////////////////////////////////////////////////////////
/// auth & registration
Route::controller(AuthController::class)->group(function (){
    Route::get('/auth','auth_form')->name('auth_form');
    Route::post('/auth/execute_auth','execute_form_auth')->name('execute_form_auth');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(RegistrationController::class)->group(function(){
    Route::get('/registration','registration_form')->name('registration_form');
    Route::post('/registration/execute_form_reg','execute_form_reg')->name('execute_form_reg');
});

///////////////////////////////////////////////////////////////////////////////
/// shop
Route::controller(ShopController::class)->group(function(){
    Route::get('/shop','shop_index')->name('shop');
    Route::get('/category/', 'show_prod_of_categ')->name('show_prod_of_categ');
    Route::match(['get','post'],'/product/', 'show_product')->name('show_product');
    //корзина
    Route::match(['get','post'],'/basket', 'basket')->name('basket');
    Route::post('/basket/order', 'order')->name('order');
    //фильтры
    Route::get('/cat/', 'show_filt_of_categ')->name('show_filt_of_categ');
});
///////////////////////////////////////////////////////////////////////////////
/// adminka
Route::controller(AdminkaController::class)->middleware('auth')->group(function (){
    Route::get('/adminka','adminka_index')->name('adminka_index');
    Route::get('/adminka/add_user', 'add_user')->name('add_user');
    Route::post('/adminka/execute_add_user', 'execute_add_user')->name('execute_add_user');
    Route::post('/adminka/edit_add_user', 'edit_add_user')->name('edit_add_user');
    Route::get('adminka/show_reg_usr', 'show_reg_usr')->name('adminka_show_reg_usr');
    Route::post('adminka/adminka_edit_reg_usr', 'edit_reg_usr')->name('adminka_edit_reg_usr');

    Route::get('adminka/add_shop_category_product', 'add_shop_category_product')->name('add_shop_category_product');
    Route::post('adminka/execute_add_shop_category_product', 'execute_add_shop_category_product')->name('execute_add_shop_category_product');
    Route::post('adminka/execute_edit_shop_category_product', 'execute_edit_shop_category_product')->name('execute_edit_shop_category_product');
// добавить продукцию
    Route::get('adminka/add_shop_product', 'add_shop_product')->name('add_shop_product');
    Route::post('adminka/execute_add_shop_product', 'execute_add_shop_product')->name('execute_add_shop_product');
// все товары
    Route::get('adminka/show_all_product', 'show_all_product')->name('show_all_product');
    Route::post('adminka/edit_all_product', 'edit_all_product')->name('edit_all_product');
    // Заказы
    Route::match(['get','post'],'/adminka/show_orders', 'show_orders')->name('show_orders');
    // Фильтры
    Route::get('adminka/add_filters', 'add_filters')->name('add_filters');
    Route::post('adminka/execute_add_filters','execute_add_filters')->name('execute_add_filters');
    Route::post('adminka/execute_one_to_many_filters','execute_one_to_many_filters')->name('execute_one_to_many_filters');
    Route::post('adminka/execute_show_one_to_many_filters','execute_show_one_to_many_filters')->name('execute_show_one_to_many_filters');
});
///////////////////////////////////////////////////////////////////////////////
Route::match(['get','post'],'/tmp', [RouteController::class, 'tmp'])->name('tmp');
