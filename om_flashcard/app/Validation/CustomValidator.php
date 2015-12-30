<?php
namespace App\Validation;

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/30/15
 * Time: 12:59 PM
 */
class CustomValidator extends \Illuminate\Validation\Validator {

    /**
     * Contain a-z / A-Z / 0-9 / !@#$%
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return int
     */
    public function validateAlphanumericSymbol($attribute, $value, $parameters)
    {
        $pattern = '/^[0-9A-Za-z!@#$%].*$/';
        $result = preg_match($pattern, $value);
        return $result;
    }

}
