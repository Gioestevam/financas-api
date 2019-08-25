<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/login')->group(function() {
    Route::get('/', 'LoginController@login')->name('login');
});

Route::namespace('API')->name('api.')->group(function() {
    Route::prefix('/persons')->group(function(){
        Route::get('/', 'PersonController@index')->name('personsGetAll');
        Route::get('/{id}', 'PersonController@show')->name('personGetById');
        
        Route::post('/', 'PersonController@store')->name('personCreate');
    });

    Route::prefix('/category')->group(function() {
        Route::get('/', 'CategoryController@index')->name('categoryGetAll');
        Route::get('/{id}', 'CategoryController@show')->name('categoryGetById');

        Route::post('/', 'CategoryController@store')->name('categoryCreate');
    });

    Route::prefix('/incoming')->group(function() {
        Route::get('/', 'IncomingController@index')->name('incomingGetAll');
        Route::get('/{id}', 'IncomingController@show')->name('incomingGetById');

        Route::post('/', 'IncomingController@store')->name('incomingCreate');
    });

    Route::prefix('/outgoing')->group(function() {
        Route::get('/', 'OutgoingController@index')->name('outgoingGetAll');
        Route::get('/{id}', 'OutgoingController@show')->name('outgoingGetById');

        Route::post('/', 'OutgoingController@store')->name('outgoingCreate');
    });

    Route::prefix('/user')->group(function() {
        Route::get('/', 'UserController@index')->name('userGetAll');
        Route::get('/{id}', 'UserController@show')->name('userGetById');

        Route::post('/', 'UserController@store')->name('userCreate');
    });
});