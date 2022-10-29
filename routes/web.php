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
Route::get('/private',[RouteController::class,'private_page'])->middleware('auth')->name('private_page');

///////////////////////////////////////////////////////////////////////////////
/// shop
Route::controller(ShopController::class)->group(function(){
    Route::get('/shop','shop_index')->name('shop');
});
///////////////////////////////////////////////////////////////////////////////
/// adminka
Route::controller(AdminkaController::class)->group(function (){
    Route::get('/adminka','adminka_index')->name('adminka_index');
    Route::get('/adminka/add_user', 'add_user')->name('add_user');
    Route::post('/adminka/execute_add_user', 'execute_add_user')->name('execute_add_user');
    Route::post('/adminka/edit_add_user', 'edit_add_user')->name('edit_add_user');
});
///////////////////////////////////////////////////////////////////////////////
Route::get('/tmp', [RouteController::class, 'tmp'])->name('tmp');
