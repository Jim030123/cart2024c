<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->middleware('guest')->name('welcome');

Route::get('/contactUs', function () {
    return view('contact');
});


Route::get('/items-view', [App\Http\Controllers\ProductController::class, 'item']);
Route::get('/items', [App\Http\Controllers\ProductController::class, 'fetchItems']);

Route::get('/send', [App\Http\Controllers\WhatsAppController::class, 'sendMessage']);

// Admin routes
// Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/addProduct', function () {
        return view('addProduct');
    });
    Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class,'add'])->name('addProduct');
    Route::get('/showProduct',[App\Http\Controllers\ProductController::class,'show'])->name('showProduct');
    Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');
    Route::post('/updateProduct',[App\Http\Controllers\ProductController::class,'update'])->name('updateProduct');
    Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteProduct');
// });

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'is_admin'])->name('admin');

Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class,'detail'])->name('productDetail');

// Add this new route
Route::get('/viewProducts',[App\Http\Controllers\ProductController::class,'viewProducts'])->name('viewProducts');

Route::post('/addCart',[App\Http\Controllers\CartController::class,'addCart'])->name('addCart');

Route::get('/myCart',[App\Http\Controllers\CartController::class,'view'])->name('myCart');

Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');


Route::get('/user', function () {
    return view('user');
})->middleware('auth')->name('user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');
