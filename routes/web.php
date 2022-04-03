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
Route::get('/', [HomeController::class ,'getShop']);
Route::post('/', [HomeController::class ,'postSearchShop']);

Route::get('/products/{id}', [App\Http\Controllers\Frontend\ProductController::class ,'getProductsShop'])->name('shop');
Route::get('/member-login',[HomeController::class,'getLogin'])->name('member-login');
Route::post('/member-login',[HomeController::class,'postLogin']);
Route::get('/member-register',[HomeController::class,'getRegister'])->name('member-register');
Route::post('/member-register',[HomeController::class,'postRegister']);

Route::get('/member-logout', [HomeController::class,'Logout'])->name('member-logout');
Route::get('shop-detail/{id}', [App\Http\Controllers\Frontend\ProductController::class ,'shopDetail'])->name('shop-detail');
Route::get('/add-to-cart/{id}',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('addToCart');
Route::get('/product_detail', function () {
    return view('frontend.home.product_detail');
});
Route::get('info-user',[App\Http\Controllers\Frontend\HomeController::class,'infoUser'])->name('info-user');
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});
// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';