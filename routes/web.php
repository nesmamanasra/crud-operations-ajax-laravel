<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/',[Productcontroller::class,'products'])->name('products');
Route::post('/add-product',[Productcontroller::class,'addProduct'])->name('add.product');
Route::post('/update-product',[Productcontroller::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[Productcontroller::class,'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data',[Productcontroller::class,'pagination']);


Route::resource('products', ProductTowController::class);
