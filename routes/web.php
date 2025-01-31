<?php


use App\Http\Controllers\Payment\PaymentController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Collection\CollectionController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Config\ConfigController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Installment\InstallmentController;



Route::get('/', function () {
    return view('welcome');
});

/** Start of Collection Route */

Route::get('/collection/filesupload',[CollectionController::class,'filesupload']);
Route::post('/collection/filesupload',[CollectionController::class,'filesupload_post']);
Route::get('/collection/create',[CollectionController::class,'create'])->name('collection.create');
Route::get('/collection/dashboard',[CollectionController::class,'dashboard'])->name('collection.dashboard');
Route::get('/collection/add-collection/{id}',[CollectionController::class,'addCollection']);
Route::post('/collection/add-collection/{id}',[CollectionController::class,'collectionCalculation']);
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

Route::post('/product/create',[ProductController::class,'store'])->name('product.store');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/dashboard',[ProductController::class,'dashboard'])->name('product.index');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');

/** End of product Route */


/** Start of Customer Route */

Route::post('/customer/create',[CustomerController::class,'store'])->name('customer.store');
Route::get('/customer/create',[CustomerController::class,'create',])->name('customer.create');
Route::get('/customer/dashboard',[CustomerController::class,'dashboard'])->name('customer.index');
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/detail/{id}',[CustomerController::class,'detail'])->name('customer.edit');
Route::put('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/show',[CustomerController::class,'show'])->name('customer.show');

/** End of Customer Route */



/** Start of Config Route */


Route::post('/config/create',[ConfigController::class,'store'])->name('config.create');
Route::get('/config/create',[ConfigController::class,'create'])->name('config.create');
Route::get('/config/dashboard',[ConfigController::class,'dashboard'])->name('config.dashboard');
Route::get('/config/delete/{id}',[ConfigController::class,'delete'])->name('config.delete');
Route::get('/config/detail/{id}',[ConfigController::class,'detail'])->name('config.edit');
Route::put('/config/update/{id}',[ConfigController::class,'update'])->name('config.update');

/** End of Config Route */


/** Start of Purchase Route */

Route::get('/purchase/create',[PurchaseController::class,'dataload','create'])
->name('purchase.dataload');

Route::post('/purchase/create',[PurchaseController::class,'store'])
->name('purchase.store');

Route::get('/purchase/dashboard',[PurchaseController::class,'dashboard'])
->name('purchase.dashboard');

Route::get('/purchase/detail/{id}',[PurchaseController::class,'detail'])
->name('purchase.detail');

Route::put('/purchase/detail/{id}',[PurchaseController::class,'update'])
->name('purchase.update');

/** End of Purchase Route */



/** Start of custom user Route */

route::get('/user/dashboard',[UserController::class,'dashboard']);
route::get('/user/detail/{id}',[UserController::class,'detail']);
route::put('/user/detail/{id}',[UserController::class,'update']);
route::get('/user/delete/{id}',[UserController::class,'delete']);

/** End of custom user Route */


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** excel input route */
Route::get('get-excel', [FileController::class, 'invoke']);
/** end of excel input  */




/** Start of Installment Route */

Route::get('installment/dashboard',[InstallmentController::class,'dashboard']);

/** End of Installment Route */



/** Start of Pyament Route */

Route::get('payment/create/{id}',[PaymentController::class,'create'])->name('payment.create');
Route::post('payment/create/{id}',[PaymentController::class,'store']);
Route::get('payment/dashboard',[PaymentController::class,'dashboard']);

/** End of Payment Route */