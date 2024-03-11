<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PhotoController::class, 'index']);

Route::resource('photos', PhotoController::class);

Route::get('stripe/{photo}', [PaymentController::class,'index'])->name('stripe.form');

Route::post('order/pay', [PaymentController::class,'pay']);
Route::get('pay/success', [PaymentController::class, 'success']);

