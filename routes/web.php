<?php


use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
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

Route::get('product-detail/{id}', [ProductController::class,'getProductDetail'])->name('product-detail');
Route::post('product-detail/stars/rate', [ProductController::class,'postRate'])->name('ajax.rate');
Route::post('product-detail/post',[ProductController::class,'PostCmt']);

Route::get('/cart',[CartController::class,'index']);
Route::post('/addToCard',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('addToCart');
Route::post('cart_quantity_up.post', [CartController::class,'plusProduct']);
Route::post('cart_quantity_down.post',[CartController::class,'minusProduct']);
Route::post('cart_quantity_delete.post',[CartController::class,'destroy']);


Route::get('/edit_profile/{id}',[App\Http\Controllers\Frontend\HomeController::class,'editProfile'])->name('edit-profile');
Route::put('/update_profile/{id}',[HomeController::class,'updateProfile'])->name('updateProfile');

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
