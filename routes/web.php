<?php

use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('/jquery', function () {
    return view('jquery');
});

Route::get('/users/register',[UserController::class,'create'])->name('user.register');
Route::get('/users/login',[UserController::class,'login'])->name('user.login');
Route::post('/users/login',[UserController::class,'store'])->name('user.store');
Route::get('/',[UserController::class,'logout'])->name('user.logout');


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

Route::post('/products',
    [ProductController::class,'store'])
    ->name('user.products.store');

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

