<?php

use App\Http\Controllers\Admin\LoginController;

use App\Http\Controllers\PaymentController;
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

Route::get('/',[PaymentController::class, 'index'])->name('main');

//------------------------------------Payment-------------------------------------------------------------------
Route::prefix('payments')->group(function (){

    Route::view('/', 'index')->name('payments.index');

    Route::view('/success', 'site.payments.success');

    Route::post('/create', [PaymentController::class, 'create'])->name('payments.create');




});




