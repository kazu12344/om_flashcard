<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Language;
use App\Http\Requests;
use Pingpong\Modules\Routing\Controller;
use App\Traits\BasicDataRegistrationPageLogic;
use App\Http\Requests\UserEditPostRequest;

class UserController extends BaseController
{
    use BasicDataRegistrationPageLogic;

    private function setViewParams()
    {
        $this->view_params = [
            'getEdit' => "{$this->module_name}::{$this->controller_name}.edit",
            'postEdit' => "{$this->controller_name}/edit",
        ];
    }

    private function setExceptionRedirectUrl()
    {
        $this->exception_redirect_route = "login";
    }

    /**
     * override method
     *
     * @return \Illuminate\View\View
     */
    public function getEdit()
    {
        $id = \Auth::front()->user()->id;
        return $this->getEditLogic($id);
    }

    /**
     * override method
     *
     * @return \Illuminate\View\View
     */
    protected function getEditViewData(array $view_data)
    {
        $language = new Language();
        $view_data['language_selectbox_data'] = $language->getSelectBoxData();
        return $view_data;
    }

    public function postEdit(UserEditPostRequest $request)
    {
        $id = \Auth::front()->user()->id;
        return $this->postEditLogic($id);
    }

}
