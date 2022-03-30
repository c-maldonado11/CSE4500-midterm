<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;

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
URL::forceScheme('https');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/hardware', HardwareController::class);

Route::get('/contact-info', function () {
    return view('contact-info');
});

Route::resource('/customer', CustomerController::class);

Route::resource('/manufacturer', ManufacturerController::class);

Route::resource('/invoice', InvoiceController::class);