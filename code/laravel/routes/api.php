<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    //プリフライとリクエスト(サーバがメソッドとヘッダをチェック)ではoptionをつけて受け取る準備をする必要あり
    Route::options('/users/register', function () {
        return response()->json();
    });
    Route::options('/users/login', function () {
        return response()->json();
    });
    Route::options('/users/home', function () {
        return response()->json();
    });
    Route::options('/words', function () {
        return response()->json();
    });
    Route::options('/words/delete', function () {
        return response()->json();
    });
    Route::options('/words/test', function () {
        return response()->json();
    });
    Route::options('/words/index', function () {
        return response()->json();
    });
    Route::options('/words/like', function () {
        return response()->json();
    });

    Route::post('/users/register', 'UsersController@registerConfirm')->name('Users.registerConfirm');
    Route::post('/users/login', 'UsersController@loginConfirm')->name('Users.loginConfirm');
    Route::post('/users/home', 'UsersController@home')->name('Users.home');
    Route::post('/words', 'WordsController@store')->name('Words.store');
    Route::put('/words', 'WordsController@update')->name('Words.update');
    // Route::delete('/words', 'WordsController@destroy')->name('Words.destroy');
    Route::post('/words/delete', 'WordsController@destroy')->name('Words.destroy');
    Route::post('/words/test', 'WordsController@test')->name('Words.test');
    Route::post('/words/index', 'WordsController@index')->name('Words.index');
    Route::post('/words/like', 'WordsController@like')->name('Words.like');
});
