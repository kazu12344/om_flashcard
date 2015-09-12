<?php

namespace App\Helpers;

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 9/12/15
 * Time: 4:06 AM
 */
class DateHelper
{
    public  static function dateFormat($date, $format = 'Y/m/d')
    {
        $DateTime = new \DateTime($date);
        return $DateTime->format($format);
    }
}