<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 6/22/15
 * Time: 12:32 AM
 */

class BaseModel extends Eloquent
{
    protected $validation_rules = [];

    /**
     * get validation rules
     *
     * @return array
     */
    public function getValidationRules($rule_name = 'validation_rules')
    {
        return $this->{$rule_name};
    }

}