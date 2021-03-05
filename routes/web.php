<?php

// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\TransactionController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers',
    'as' => 'admin.'
], function () {
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->except(['show']);
    Route::resource('transactions', TransactionController::class)->except(['show', 'create', 'store', 'edit']);
    Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);
});

