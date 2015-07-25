<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->route_action = \Route::currentRouteAction();
        $route_action_arr = explode('@', $this->route_action);
        $this->action = $route_action_arr[1];
    }

}
