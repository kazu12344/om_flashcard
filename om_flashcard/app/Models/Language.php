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
    protected $fillable = ['code', 'string'];

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
        'code' => 'required',
        'string' => 'required|alpha_dash',
    ];

    /**
     * validation rules for user edit
     *
     * @var array
     */
    protected $validation_rules_for_edit = [
        'code' => 'required',
        'string' => 'required|alpha_dash',
    ];

    public function getSelectBoxData($options = [])
    {
        $default = [
            'default' => '',
        ];
        $options = array_merge($default, $options);

        $select_box_data = [];
        $select_box_data[''] = $options['default'];
        $languages = self::orderBy('code')->get();
        foreach ($languages as $language) {
            $select_box_data[$language->id] = $language->string;
        }
        return $select_box_data;
    }

}