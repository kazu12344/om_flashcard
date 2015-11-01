<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('/', 'AdminController@index');
    Route::controller('user', 'UserController');
    Route::controller('admin_user', 'AdminUserController');

});