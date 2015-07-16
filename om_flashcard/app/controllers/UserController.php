<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 11/22/14
 * Time: 10:37 AM
 */
class UserController extends BaseController {

    /**
     * user list
     *
     * @return mixed
     */
    public function getIndex()
    {
        $users = User::all();
        return View::make('user/index')->with('users', $users);
    }

    /**
     * get user create
     *
     * @return mixed
     */
    public function getCreate()
    {
        return $this->getEdit();
    }

    /**
     * post user create
     *
     * @return mixed
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
        return View::make('user/edit')->with(compact('user'));
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
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        // set post data and save
        $user->fill(Input::all());
        $user->save();
        return Redirect::to('users/index')
            ->with('message', 'ユーザ情報を登録しました。');
    }

//    public function delete()
//    {
//        $users = User::all();
//
//        return View::make('users/index')->with('users', $users);
//    }

}