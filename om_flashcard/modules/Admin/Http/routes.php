<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{

    Route::group(['middleware' => 'adminAuth'], function(){
        Route::controller('user', 'UserController');
        Route::controller('admin_user', 'AdminUserController');
    });
//	Route::get('/', 'AdminController@index');

    Route::controller('login', 'Auth\AuthController');
});