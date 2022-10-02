<?php

use App\Http\Controllers\Site\HomeController;
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

    /** localization for langs */
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], 
    function(){

        /* frontend routes */
        Route::get('/', [HomeController::class , 'index'])->name('home');
        Route::get('category/{id}' , [HomeController::class , 'getCategory'])->name('categories');
        Route::get('search/' , [HomeController::class , 'search'])->name('search');
        

    }); 
