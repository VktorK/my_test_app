<?php

use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jquery', function () {
    return view('jquery');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/registerUser', function () {
    echo '1111111';
})->name('submit.form');

Route::get('/products/index',
    [ProductController::class,'index'])
    ->name('user.product.index');

Route::get('/products/{product}/edit',
    [ProductController::class,'edit'])
    ->name('user.products.edit');

Route::put('/products/{product}',
    [ProductController::class,'update'])
    ->name('user.products.update');

Route::get('/products/create',
    [ProductController::class,'create'])
    ->name('user.products.create');

Route::get('/products/{product}',
    [ProductController::class,'show'])
    ->name('user.products.show');

Route::delete('/products/{product}',
    [ProductController::class,'destroy'])
    ->name('user.products.destroy');

Route::get('/categories/index',
    [CategoryController::class,'index'])
    ->name('user.categories.index');

