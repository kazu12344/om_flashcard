<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 11/23/15
 * Time: 1:29 PM
 */

namespace App\Helpers;

class OmUrlHelper
{

    /**
     * @param array $routes
     * @param string $return_value
     * @return bool
     */
    public static function isSameUrlWithCurrentPage(array $routes, $return_value = '')
    {
        $current_url = str_replace('/index', '', \Request::url());
        foreach($routes as $route) {
            if ($current_url === url($route)) {
                return !empty($return_value) ? $return_value : true;
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public static function getActionName($options = array())
    {
        $options = OmUtileHelper::getOptionArray(
            ['only_action_name' => true],
            $options
        );
        $route_action = \Route::currentRouteAction();
        if ($options['only_action_name']) {
            $route_action_array = explode('@', $route_action);
            $route_action = $route_action_array[1];
        }
        return $route_action;
    }

    public static function getControllerName($options = array())
    {
        $options = OmUtileHelper::getOptionArray(
            ['only_controller' => true],
            $options
        );
        $controller_name = str_replace(
            'Controller',
            '',
            class_basename($this->route_action_arr[0])
        );
        $controller_name = snake_case($controller_name);
        return $route_action;
    }

}