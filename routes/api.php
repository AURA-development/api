<?php

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'version' => '1.0.0'
    ]);
});

Route::prefix('v1')->group(function () {
    Route::get('/', "InfoController@apiInfo");

    Route::prefix('users')->group(function () {
        Route::get('/', "UserController@listUsers");
        Route::post('/create', "UserController@addUser");
        Route::get('/{id}', "UserController@get");
    });
});