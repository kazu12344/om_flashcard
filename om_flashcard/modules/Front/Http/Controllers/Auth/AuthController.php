<?php

namespace Modules\Front\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Modules\Front\Http\Requests;
use Illuminate\Http\Request;

class AuthController extends \Modules\Front\Http\Controllers\BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';

    protected $loginPath = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
//        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * login form
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view("front::auth.login");
    }

    /**
     * login post action
     *
     * @param Requests\LoginPostRequest $request
     * @return \Illuminate\View\View
     */
    public function postIndex(\Modules\Front\Http\Requests\LoginPostRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $result = \Auth::front()->attempt(['email' => $email, 'password' => $password]);
        if ($result) {
            return \Redirect::to("/");
        }
        return view("front::auth.login");
    }

    public function postLogout()
    {

    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
