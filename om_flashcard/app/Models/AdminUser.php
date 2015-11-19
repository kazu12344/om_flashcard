<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class AdminUser extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

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
        'password' => 'required',
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

    public function fill(array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        }
        parent::fill($data);
    }
}
