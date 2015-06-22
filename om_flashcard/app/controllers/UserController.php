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

    public function getCreate()
    {
        return $this->getEdit();
    }

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
        if (!empty($id)) {
            $user = User::find($id);
        }
        return View::make('user/edit')->with(compact('user'));
    }

    /**
     * post user edit
     */
    public function postEdit()
    {
        $user = new User;
        $rules = $user->getValidationRules();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * user create
     *
     * @return mixed
     */
    public function delete()
    {
        $users = User::all();

        return View::make('users/index')->with('users', $users);
    }

}