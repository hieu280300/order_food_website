<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class ,'shop'])->name('shop');
Route::get('/member-login',[HomeController::class,'getLogin']);
Route::post('/member-login',[HomeController::class,'postLogin']);
Route::get('/member-register',[HomeController::class,'getRegister']);
Route::post('/member-register',[HomeController::class,'postRegister']);

Route::get('/member-logout', [HomeController::class,'Logout'])->name('member-logout');
Route::get('shop-details/{id}', [App\Http\Controllers\Frontend\HomeController::class ,'shop_detail'])->name('shop_detail');
Route::get('/add-to-cart/{id}',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('addToCart');
Route::get('/product_detail', function () {
    return view('frontend.home.product_detail');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});
// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';