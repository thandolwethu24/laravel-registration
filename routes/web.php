<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show']);
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store']);


Auth::routes();
Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
Route::get('create-form',[\App\Http\Controllers\CustomerController::class, 'create'])->name('invoices.create');
Route::get('/payments/create', [\App\Http\Controllers\PaymentController::class, 'create'])
->middleware('auth');

Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'store'])
->middleware('auth');


Route::resource('/receipt', \App\Http\Controllers\InvoiceController::class);

Route::post('insert',[\App\Http\Controllers\InvoiceController::class, 'store']);
