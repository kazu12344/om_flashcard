<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 1/16/16
 * Time: 9:59 AM
 */

namespace App\Helpers;


class OmUtileHelper
{
    public static function getOptionArray(array $default, array $options)
    {
        return array_merge($default, $options);
    }
}