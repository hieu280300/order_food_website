<?php


use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
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

Route::get('/cart',[CartController::class,'index']);
Route::post('/addToCard',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('addToCart');
Route::post('cart_quantity_up.post', [CartController::class,'plusProduct']);
Route::post('cart_quantity_down.post',[CartController::class,'minusProduct']);
Route::post('cart_quantity_delete.post',[CartController::class,'destroy']);


Route::get('/edit_profile/{id}',[App\Http\Controllers\Frontend\HomeController::class,'editProfile'])->name('edit-profile');
Route::put('/update_profile/{id}',[HomeController::class,'updateProfile'])->name('updateProfile');

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/list', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/list', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
});


Route::get('/product_detail', function () {
    return view('frontend.home.product_detail');
});
Route::get('info-user',[App\Http\Controllers\Frontend\HomeController::class,'infoUser'])->name('info-user');

Route::get('info-shop',[HomeController::class,'infoShop'])->name('info-shop');
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});
// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
