<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 11/22/15
 * Time: 5:11 AM
 */

namespace App\Models;


class Language extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lang_code', 'lang_string'];

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
        'lang_code' => 'required',
        'lang_string' => 'required|alpha_dash',
    ];

    /**
     * validation rules for user edit
     *
     * @var array
     */
    protected $validation_rules_for_edit = [
        'lang_code' => 'required',
        'lang_string' => 'required|alpha_dash',
    ];

}