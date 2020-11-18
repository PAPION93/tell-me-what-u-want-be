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
    // Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::apiResource('users', 'UserController');
    Route::get('users/me/favs', 'UserController@getFavs');
    Route::put('users/me/favs', 'UserController@updateFavs');

    Route::apiResource('restaurants', 'RestaurantController');
    Route::apiResource('images', 'ImageController')->only(['index', 'store', 'show']);
    // });

    Route::get('test', function () {
        phpinfo();
    });
});
