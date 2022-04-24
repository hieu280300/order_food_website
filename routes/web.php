<?php


use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
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
Route::get('/shopclose/{id}',[ProductController::class,'getShopClose']);
Route::get('/member-login',[HomeController::class,'getLogin'])->name('member-login');
Route::post('/member-login',[HomeController::class,'postLogin']);
Route::get('/member-register',[HomeController::class,'getRegister'])->name('member-register');
Route::post('/member-register',[HomeController::class,'postRegister']);
Route::get('/member-logout', [HomeController::class,'Logout'])->name('member-logout');

Route::get('product-detail/{id}', [ProductController::class,'getProductDetail'])->name('product-detail');
Route::post('product-detail/stars/rate', [ProductController::class,'postRate'])->middleware(['member']);
Route::post('product-detail/post',[ProductController::class,'PostCmt'])->middleware(['member']);

Route::get('/cart',[CartController::class,'index']);
Route::post('/addToCard',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('addToCart');
Route::post('/product-detail/addToCard',[App\Http\Controllers\Frontend\CartController::class,'detail_addToCart']);
Route::post('cart_quantity_up.post', [CartController::class,'plusProduct']);
Route::post('cart_quantity_down.post',[CartController::class,'minusProduct']);
Route::post('cart_quantity_delete.post',[CartController::class,'deleteProduct']);
Route::post('edit_note.post',[CartController::class,'edit']);

Route::post('/cart',[OrderController::class,'store'])->middleware(['member']);


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
Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
    Route::get('/list', [OrderController::class, 'index'])->name('index');
    Route::post('/list', [OrderController::class, 'search'])->name('search');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
});


Route::get('/product_detail', function () {
    return view('frontend.home.product_detail');
});
Route::get('info',[App\Http\Controllers\Frontend\HomeController::class,'infoUser'])->name('info-user');
Route::get('manage_orders',[App\Http\Controllers\Frontend\HomeController::class,'manage_order'])->name('manage_order');
Route::get('order-details/{id}',[App\Http\Controllers\Frontend\HomeController::class,'order_detail'])->name('order_detail');
Route::get('info-shop',[App\Http\Controllers\Frontend\HomeController::class,'infoShop'])->name('info-shop');
Route::get('/edit_profile_shop/{id}',[App\Http\Controllers\Frontend\HomeController::class,'editProfileShop'])->name('edit-profile-shop');
Route::put('/update_profile_shop/{id}',[App\Http\Controllers\Frontend\HomeController::class,'updateProfileShop'])->name('update-profile-shop');
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/email', function () {
    return view('frontend/carts/email');
});
Route::get('/filter-by-date',[HomeController::class,'filter_by_date']);
// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
