<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/', [RouteController::class,'index'])->name('home');




//Route::get('/', function () {
//    return view('welcome');
//});
