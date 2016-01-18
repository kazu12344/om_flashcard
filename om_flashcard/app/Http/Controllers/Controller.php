<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @var current action name
     */
    protected $action_name = '';

    /**
     * @var current controller name
     */
    protected $controller_name = '';

    /**
     * @var string
     */
    protected $model_name = '';

    protected $view_data = [];

    /**
     * constructor
     */
    public function __construct()
    {
        $this->route_action = \Route::currentRouteAction();
        $this->route_action_arr = explode('@', $this->route_action);
        $this->setActionName();
        $this->setControllerName();
        $this->setModelName();
        $this->setViewData();
    }

    /**
     * set current action_name
     */
    private function setActionName()
    {
        // set action name
        $this->action_name = $this->route_action_arr[1];
    }

    /**
     * set current controller name
     */
    private function setControllerName()
    {
        $this->controller_name = str_replace(
            'Controller',
            '',
            class_basename($this->route_action_arr[0])
        );
        $this->controller_name = snake_case($this->controller_name);
    }

    /**
     * set current model name
     */
    private function setModelName()
    {
        $this->model_name = \Config::get('const.model_dir_namespace') .
                            '\\' .
                            studly_case($this->controller_name);
    }

    private function setViewData()
    {
        $this->view_data['action_name'] = $this->action_name;
        $this->view_data['controller_name'] = $this->controller_name;
        $this->view_data['model_name'] = $this->model_name;
    }
}
