<?php


use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Route;


        Route::view('/', 'auth.login')->name('auth');

        Route::match(['get', 'post'],'/login')->middleware('admin.login')->name('login');

        Route::middleware('auth.admin')->group(function (){

        Route::match(['get', 'post'],'/logout')->middleware('admin.logout')->name('logout');

        Route::view('/main','admin.index' )->name('index');

        //-------------------------------------Users--------------------------------------------------------------------

        Route::prefix('users')->group(function (){

        Route::get('/', [UserController::class, 'index'])->name('users');

        Route::get('/show/{user}', [UserController::class, 'show'])->name('user.show');

        Route::view('/create', 'admin.user.edit')->name('user.create');

        Route::post('/store', [UserController::class, 'store'])->name('user.store');

        Route::match(['get','post'],'/edit/{user}', [UserController::class, 'edit'])->name('user.edit');

        Route::put('/update/{user}', [UserController::class, 'update'])->name('user.update');

        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });
        //---------------------------------------News-------------------------------------------------------------------

            Route::resources(['news'=>NewsController::class]);

       //----------------------------------------Settings---------------------------------------------------------------

            Route::resources(['settings'=>SettingController::class]);

        //----------------------------------------Questions-------------------------------------------------------------

            Route::resources(['questions'=>QuestionController::class]);

        //-------------------------------------Dictionaries-------------------------------------------------------------

            Route::resources(['dictionaries'=>DictionaryController::class]);



    });






