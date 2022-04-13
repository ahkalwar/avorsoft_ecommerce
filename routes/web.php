<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductImagesController;

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
//     return view('welcome');
// });

require __DIR__.'/auth.php';
Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Admin 
//Route::get('/add_category', CategoryController::class, 'add_category');
Route::resource('/category', CategoryController::class);
Route::resource('/role', RoleController::class);
Route::resource('/user', UserController::class);
Route::resource('/product', ProductController::class);

//Product Images Start from here...

Route::get('/productimages/{id}', [ProductController::class, 'productimages']);
Route::resource('/productimage', ProductImagesController::class);
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/categories/{category_name}', [HomeController::class, 'products_by_category']);
Route::get('/single/{product_name}', [HomeController::class, 'single_product']);
Route::post('/customer_register', [RegisterController::class, 'customer_register']);
Route::get('/account', [RegisterController::class, 'account']);
Route::post('/update_account/{id}', [RegisterController::class, 'update_account']);
Route::post('/customer_login', [LoginController::class, 'customer_login']);
Route::get('/customer_logout', [LoginController::class, 'customer_logout']);
Route::post('/add_item_to_cart', [CartController::class, 'add_item_to_cart']);
Route::get('/cart', [CartController::class, 'cart_list']);
Route::post('/remove_cart_item', [CartController::class, 'remove_cart_item']);
Route::get('/addimage/{id}', [ProductImagesController::class, 'addimage']);



Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/place_order', [CheckoutController::class, 'place_order']);
