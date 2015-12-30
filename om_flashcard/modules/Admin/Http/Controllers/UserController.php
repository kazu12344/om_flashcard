<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\BasicDataRegistrationPageLogic;

class UserController extends BaseController
{
    use BasicDataRegistrationPageLogic;
}
