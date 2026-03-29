<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class,'shop'])->name('shop');
Auth::routes();
Route::get('/shop-item/{id}',[App\Http\Controllers\FrontController::class,'shopItem'])->name('shop-item');
Route::group(['prefix'=>'backend','as'=>'backend.'],function(){
Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');