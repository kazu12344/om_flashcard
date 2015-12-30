<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 9/28/15
 * Time: 6:30 AM
 */
namespace Modules\Front\Http\Controllers;

use App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class BaseController extends \App\Http\Controllers\Controller
{
    public $module_name = 'front';

    public function __construct()
    {
        parent::__construct();
    }

}