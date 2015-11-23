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
}