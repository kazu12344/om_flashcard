<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 11/22/14
 * Time: 10:37 AM
 */
class UsersController extends BaseController {

    public function index()
    {
        $users = User::all();

        return View::make('users')->with('users', $users);
    }
}