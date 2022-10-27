<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ShopController;

use Illuminate\Http\Request;

//Route::controller(RouteController::class)->group(function (){
//
//});
Route::get('/', [RouteController::class,'index'])->name('home');
Route::get('/about',[RouteController::class,'about'])->name('about');
Route::get('/contacts',[RouteController::class,'contacts'])->name('contacts');
//Route::get('/auth',[AuthController::class,'auth_form'])->name('auth');
///////////////////////////////////////////////////////////////////////////////
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
Route::controller(ShopController::class)->group(function(){
    Route::get('/shop','shop_index')->name('shop');
});


Route::get('/tmp', [RouteController::class, 'tmp'])->name('tmp');
