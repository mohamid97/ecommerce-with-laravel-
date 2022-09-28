<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

;
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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], 
    function(){ 
    Route::get('/dashboard/login' , [AuthController::class , 'index'])->name('dashboard.login');
    Route::post('/dashboard/login' , [AuthController::class , 'checkAuth'])->name('dashboard.checkLogin');
    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
        Route::resource('products' , ProductController::class);
        Route::resource('categories' ,CategoryController::class)->except('show');
        Route::resource('users' ,UserController::class)->except('show'); 
        Route::get('/home' , [HomeController::class , 'index'])->name('home');    
       });
});
