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

use Ikazuchi\Http\Controllers\Api\RecieverController;

Route::get('', function () {
    return view('main.home');
});

// Authentication routes...
Route::get('auth/login', [
    'as'         => 'AuthLogin',
    'uses'       => 'Auth\AuthController@getLogin',
    'middleware' => 'guest'
]);

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'Backend\DashboardController@index');
    Route::get('alerts', 'Backend\DashboardController@alerts');
});

Route::group(['prefix' => 'api'], function() {
    Route::post('callback', 'Api\RecieverController@input');

    Route::group(['prefix' => 'devices'], function() {
        Route::get('', 'Api\DeviceController@index');
        Route::get('{device}/query', 'Api\PlotController@query');
        Route::get('{device}/top', 'Api\PlotController@top');
        Route::get('{device}/now', 'Api\PlotController@now');
        Route::get('{device}', 'Api\DeviceController@show');
    });

    Route::group(['prefix' => 'alerts'], function() {
        Route::get('', 'Api\AlertController@index');
        Route::post('', 'Api\AlertController@add');
        Route::post('{alert}', 'Api\AlertController@edit');
        Route::get('{alert}', 'Api\AlertController@show');
    });
});
