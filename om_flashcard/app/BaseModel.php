<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
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
