<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 11/20/15
 * Time: 1:52 PM
 */
namespace App\Traits;

trait BasicDataRegistrationPageLogic
{
    protected $view_params = [];

    protected $view_param = '';

    protected $exception_redirect_route = '';

    public function __construct()
    {
        parent::__construct();
        $this->setViewParams();
        $this->setViewParam();
        $this->setExceptionRedirectUrl();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        ${str_plural($this->controller_name)} = call_user_func_array(
            [$this->model_name, "paginate"],
            [20]
        );
        return view(
            $this->view_param,
            compact(str_plural(str_plural($this->controller_name)))
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return $this->getEditLogic();
    }

    /**
     * post user create
     *
     * @return Response
     */
    public function postCreate()
    {
        return $this->postEditLogic();
    }

    /**
     * user edit
     *
     * @param null $id
     * @return mixed
     */
    public function getEdit($id = null)
    {
        return $this->getEditLogic($id);
    }

    private function getEditLogic($id = null)
    {
        $data = [];
        if ($this->action_name === 'getEdit') {
            if (empty($id)) {
                return \Redirect::to($this->exception_redirect_route);
            }
            $data = call_user_func_array([$this->model_name, 'find'], [$id]);
            if (empty($data)) {
                return \Redirect::to($this->exception_redirect_route);
            }
        }
        return view(
            $this->view_param,
            [$this->controller_name => $data]
        );
    }


    /**
     * post user edit
     *
     * @param null $id
     * @return mixed
     */
    public function postEdit($id = null)
    {
        $this->postEditLogic($id);
    }

    /**
     * @param null $id
     * @return mixed
     */
    private function postEditLogic($id = null)
    {
        if ($this->action_name === 'postEdit') {
            if (empty($id)) {
                return \Redirect::to($this->exception_redirect_route);
            }
            $data = call_user_func_array([$this->model_name, 'find'], [$id]);
            if (empty($data)) {
                return \Redirect::to($this->exception_redirect_route);
            }
            $validation_rule_name = 'validation_rules_for_edit';
        } elseif ($this->action_name === 'postCreate') {
            $data = new $this->model_name;
            $validation_rule_name = 'validation_rules_for_create';
        } else {
            return \Redirect::to($this->exception_redirect_route);
        }

        // validation
        $rules = $data->getValidationRules($validation_rule_name);
        $validator = \Validator::make(\Input::all(), $rules);
        if ($validator->fails()) {
            return \Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        // set post data and save
        $data->fill(\Input::all());
        $data->save();
        return \Redirect::to($this->view_param)
            ->with('message', 'save success');
    }

    private function setExceptionRedirectUrl()
    {
        if (empty($this->exception_redirect_route)) {
            $this->exception_redirect_route =
                "{$this->module_name}/{$this->controller_name}/index";
        }
    }

    private function setViewParams()
    {
        $this->view_params = [
            'getIndex' => "{$this->module_name}::{$this->controller_name}.index",
            'getCreate' => "{$this->module_name}::{$this->controller_name}.edit",
            'getEdit' => "{$this->module_name}::{$this->controller_name}.edit",
            'postCreate' => "{$this->module_name}/{$this->controller_name}/index",
            'postEdit' => "{$this->module_name}/{$this->controller_name}/index",
        ];
    }

    private function setViewParam()
    {
        if (empty($this->view_params[$this->action_name])) {
            abort(404);
        }
        $this->view_param = $this->view_params[$this->action_name];

        if (\Request::isMethod('get') && !\View::exists($this->view_param)) {
            abort(404);
        }
    }
}