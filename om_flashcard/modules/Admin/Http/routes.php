<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::group(['middleware' => 'adminAuth'], function(){
        Route::controller('user', 'UserController');
        Route::controller('admin_user', 'AdminUserController');
        Route::controller('admin_user', 'AdminUserController');
        Route::controller('language', 'LanguageController');
    });
    Route::controller('login', 'Auth\AuthController');
    Route::get('logout', 'Auth\AuthController@getLogout');
});