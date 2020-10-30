<?php

use Carbon\Traits\Localization ;
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
if (!defined('DEFAULT_PATH')) define('DEFAULT_PATH','storage/app/public');



Auth::routes(['verify' => true]);
Route::group( ['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ],function(){
    
    Route::get('/', function () {
        return view('welcome');
    })->name('index') ;

    
    Route::group(['namespace' => 'Site'], function (){
        //  route to register
        Route::get('register', 'RegisterController@register')->name('register') ;
        Route::post('singup' , 'RegisterController@singup')->name('singup') ;

        //  route to confirm register
        Route::get('confirm/{id}' , 'RegisterController@getConfirm')->name('getConfirm') ; 
        Route::post('setConfirm/{id}' , 'RegisterController@setConfirm')->name('setConfirm') ; 

       //  route to login
        Route::group(['middleware' => 'guest:web'], function (){
            Route::get('getLogin' , 'LoginController@getLogin')->name('getLogin') ;
            Route::post('login' , 'LoginController@login')->name('login') ;

            //  route to login facebook
            Route::get('/login/facebook','SocialeController@redirectToProvider')->name('redirect');
            Route::get('/login/facebook/callback','SocialeController@handleProviderCallback');
        
        });
        
        //  route to logout
        Route::get('logout' , 'LoginController@logout')->name('logout') ;
        

    
    }); 
});

