<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Collection\CollectionController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Config\ConfigController;


Route::get('/', function () {
    return view('welcome');
});

/** Start of Collection Route */

Route::get('/collection/filesupload',[CollectionController::class,'filesupload']);




/** End of Collection Route */


/** Start of Staff Route */

Route::post('/staff/create',[StaffController::class,'create'])->name('staff.create');
Route::get('/staff/create',[StaffController::class,'configdata'])->name('staff.config');

Route::get('/staff/dashboard',[StaffController::class,'dashboard'])->name('staff.index');
Route::get('/staff/delete/{id}',[StaffController::class,'delete'])->name('staff.delete');
Route::get('/staff/detail/{id}',[StaffController::class,'detail'])->name('staff.edit');


Route::get('/staff/show/{id}',[StaffController::class,'show'])->name('staff.show');   
Route::put('/staff/update/{id}',[StaffController::class,'update'])->name('staff.update');

/** End of Staff Route */


/** Start of product Route */

Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/dashboard',[ProductController::class,'dashboard'])->name('product.index');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');

/** End of product Route */


/** Start of Customer Route */

Route::post('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::get('/customer/create',[CustomerController::class,'staffdata'])->name('customer.create');


Route::get('/customer/dashboard',[CustomerController::class,'dashboard'])->name('customer.index');
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/detail/{id}',[CustomerController::class,'detail'])->name('customer.edit');
Route::put('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/show',[CustomerController::class,'show'])->name('customer.show');

/** End of Customer Route */



/** Start of Coonfig Route */

// Route::post('/config/create',[ConfigController::class,'create'])->name('config.create');
Route::get('/config/create',[ConfigController::class,'create'])->name('config.create');
Route::get('/config/dashboard',[ConfigController::class,'dashboard'])->name('config.index');
Route::get('/config/delete/{id}',[ConfigController::class,'delete'])->name('config.delete');
Route::get('/config/detail/{id}',[ConfigController::class,'detail'])->name('config.edit');
Route::put('/config/update/{id}',[ConfigController::class,'update'])->name('config.update');

/** End of Config Route */

// Route::get('staff/create',[DataconfigController::class,'staffConfigdata']);
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


