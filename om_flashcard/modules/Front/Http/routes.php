<?php

Route::group(['namespace' => 'Modules\Front\Http\Controllers'], function()
{
    Route::group(['middleware' => 'frontAuth'], function() {
        Route::get('/', 'FrontController@index');
    });
    Route::controller('login', 'Auth\AuthController');
});