<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', [HomeController::class, 'index']);
Route::get('/categories/{category_name}', [HomeController::class, 'products_by_category']);
Route::get('/single/{product_name}', [HomeController::class, 'single_product']);
Route::post('/customer_register', [RegisterController::class, 'customer_register']);
Route::post('/customer_login', [LoginController::class, 'customer_login']);
Route::get('/customer_logout', [LoginController::class, 'customer_logout']);
Route::post('/add_item_to_cart', [CartController::class, 'add_item_to_cart']);
Route::get('/cart', [CartController::class, 'cart_list']);
Route::post('/remove_cart_item', [CartController::class, 'remove_cart_item']);