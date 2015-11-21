<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sentences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'text'];

    /**
     * soft delete setting
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * validation rules for user create
     *
     * @var array
     */
    protected $validation_rules_for_create = [
        'title' => 'required',
        'text' => 'required',
    ];

    /**
     * validation rules for user create
     *
     * @var array
     */
    protected $validation_rules_for_edit = [
        'title' => 'required',
        'text' => 'required',
    ];

}
