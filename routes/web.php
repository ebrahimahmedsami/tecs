<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RolesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function () {
        return view('front.home');
    });

    Route::group(['prefix' => 'admin'],function (){
        Route::name('admin.')->group(function (){

            Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
            Route::post('login', [AuthController::class, 'login'])->name('startSession');

            Route::group(['middleware' => 'auth'],function (){
                Route::get('home',[HomeController::class,'index'])->name('home');
                Route::get('destroy',[AuthController::class,'logout'])->name('logout');


                Route::resource('roles', RolesController::class);
                Route::post('permission/add',[RolesController::class,'add_permission'])->name('add_permission');


            });
        });
    });
});
