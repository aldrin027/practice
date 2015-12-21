<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@show']);
Route::post('post-login', ['as' => 'logIn', 'uses' => 'HomeController@logIn']);

Route::group(['middleware' => 'auth', 'prefix' => 'user'],function(){

    Route::get('dashboards', ['as' => 'dashboards', 'uses' => 'HomeController@showDashboard']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);
    Route::get('myShop', ['as' => 'myShop', 'uses' => 'HomeController@getMyShop']);
    Route::get('poker', ['as' => 'poker', 'uses' => 'HomeController@getPoker']);
    Route::get('roulette', ['as' => 'roulette', 'uses' => 'HomeController@getRoulette']);
    Route::get('slotMachine', ['as' => 'slot', 'uses' => 'HomeController@getSlotMachine']);
    Route::get('crud', ['as' => 'crud', 'uses' => 'HomeController@getCrud']);
//    Route::get('botData', ['as' => 'bots', 'uses' => 'HomeController@getBotData']);
});

