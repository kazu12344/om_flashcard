<?php

class BaseController extends Controller {

    /**
     * constructor
     */
    public function __construct()
    {
        $this->route_action = Route::currentRouteAction();
        $route_action_arr = explode('@', $this->route_action);
        $this->action = $route_action_arr[1];
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}
