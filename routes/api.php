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

Route::group(['as' => 'api.', 'namespace' => 'Api'],
    function () {
        Route::get('/', 'HomeController@home');
        Route::post('/register', 'Auth\RegisterController@register');

        Route::middleware('auth:api')->group(function () {
            Route::resource('adverts', 'Adverts\AdvertController')->only('index', 'show');
            Route::post('/adverts/{advert}/favorite', 'Adverts\FavoriteController@add');
            Route::delete('/adverts/{advert}/favorite', 'Adverts\FavoriteController@remove');

            Route::group(
                [
                    'prefix' => 'user',
                    'as' => 'user.',
                    'namespace' => 'User',
                ],
                function () {
                    Route::get('/', 'ProfileController@show');
                    Route::put('/', 'ProfileController@update');
                    Route::get('/favorites', 'FavoriteController@index');
                    Route::delete('/favorites/{advert}', 'FavoriteController@remove');

                    Route::resource('adverts', 'AdvertController')->only('index', 'show', 'update', 'destroy');
                    Route::post('/adverts/create/{category}/{region?}', 'AdvertController@store');

                    Route::put('/adverts/{advert}/photos', 'AdvertController@photos');
                    Route::put('/adverts/{advert}/attributes', 'AdvertController@attributes');
                    Route::post('/adverts/{advert}/send', 'AdvertController@send');
                    Route::post('/adverts/{advert}/close', 'AdvertController@close');
                }
            );
        });
});
