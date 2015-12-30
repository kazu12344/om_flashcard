<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\BasicDataRegistrationPageLogic;

class AdminUserController extends BaseController
{
    use BasicDataRegistrationPageLogic;
}
