<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $users = User::paginate(20);
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return $this->getEdit();
    }

    /**
     * post user create
     *
     * @return Response
     */
    public function postCreate()
    {
        return $this->postEdit();
    }

    /**
     * user edit
     *
     * @param null $id
     * @return mixed
     */
    public function getEdit($id = null)
    {
        $user = [];
        if ($this->action === 'getEdit' && !empty($id)) {
            $user = User::find($id);
            if (empty($user)) {
                return Redirect::to('user/index');
            }
        }
        return view('admin.user.edit', compact('user'));
    }

    /**
     * post user edit
     *
     * @param null $id
     * @return mixed
     */
    public function postEdit($id = null)
    {
        if ($this->action === 'postEdit' && !empty($id)) {
            $user = User::find($id);
            if (empty($user)) {
                return Redirect::to('users/index');
            }
            $validation_rule_name = 'validation_rules_for_edit';
        } else {
            $user = new User;
            $validation_rule_name = 'validation_rules_for_create';
        }
        // validation
        $rules = $user->getValidationRules($validation_rule_name);
        $validator = \Validator::make(\Input::all(), $rules);
        if ($validator->fails()) {
            return \Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        // set post data and save
        $user->fill(\Input::all());
        $user->save();
        return \Redirect::to('admin/users/index')
            ->with('message', 'saved user data');
    }

}
