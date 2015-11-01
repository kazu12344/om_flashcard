<?php

Route::group(['prefix' => 'front', 'namespace' => 'Modules\Front\Http\Controllers'], function()
{
	Route::get('/', 'FrontController@index');
});