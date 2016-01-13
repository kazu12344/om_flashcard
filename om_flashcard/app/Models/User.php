<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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
        'name' => 'required',
        'email' => 'required|email|unique:users',
    ];

    /**
     * validation rules for user edit
     *
     * @var array
     */
    protected $validation_rules_for_edit = [
        'name' => 'required',
        'email' => 'required|email',
    ];

    /**
     * Define many to many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany('App\Models\Language', 'language_user')
            ->withPivot('language_id', 'user_id', 'is_native_language')
            ->withTimestamps();
    }

    /**
     * Override
     */
    public function fill(array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        parent::fill($data);
    }

    /**
     * Override
     */
    public function save(array $options = [])
    {
        // Get and check params
        $native_languages = \Request::input('native_languages');
        $practicing_languages = \Request::input('practicing_languages');
        if (empty($native_languages) || empty($practicing_languages)) {
            return false;
        }

        // Make data to save language status to intermediate table.
        $native_languages = $this->getLanguageSaveData(
            $native_languages, $is_native = true
        );
        $practicing_languages = $this->getLanguageSaveData(
            $practicing_languages, $is_native = false
        );
        $languages = $native_languages + $practicing_languages;

        // Save data to intermediate table.
        return \DB::transaction(function() use ($languages)
        {
            try {
                $this->languages()->sync($languages);
                return parent::save();
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    /**
     * Make data to save language status to intermediate table.
     *
     * @param array $native_languages
     * @param $is_native
     * @return array
     */
    private function getLanguageSaveData(array $native_languages, $is_native)
    {
        $save_data = [];
        foreach ($native_languages as $native_language_id) {
            $save_data[$native_language_id] = ['is_native_language' =>  $is_native];
        }
        return $save_data;
    }
}
