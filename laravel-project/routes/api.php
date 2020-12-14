<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::group(['middleware' => 'api'], function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');

        Route::apiResource('restaurants', 'RestaurantController');
        Route::apiResource('images', 'ImageController')->only(['index', 'store', 'show']);

        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::apiResource('users', 'UserController');
            Route::get('users/me/likes', 'RestaurantLikeController@index');
            Route::post('restaurants/{restaurant}/likes', 'RestaurantLikeController@store');
            Route::delete('restaurants/{restaurant}/likes', 'RestaurantLikeController@destroy');
        });

        Route::get('test', function () {
        });
    });
});
