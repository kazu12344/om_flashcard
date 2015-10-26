<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 9/28/15
 * Time: 6:30 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
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
            "admin.{$this->controller_name}.index",
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
        $data = [];
        if ($this->action_name === 'getEdit' && !empty($id)) {
            $data = call_user_func_array([$this->model_name, 'find'], [$id]);
            if (empty($data)) {
                return Redirect::to("admin/{$this->controller_name}/index");
            }
        }
        return view(
            "admin.{$this->controller_name}.edit",
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
        if ($this->action_name === 'postEdit' && !empty($id)) {
            $data = call_user_func_array([$this->model_name, 'find'], [$id]);
            if (empty($data)) {
                return Redirect::to("admin/{$this->controller_name}/index");
            }
            $validation_rule_name = 'validation_rules_for_edit';
        } else {
            $data = new $this->model_name;
            $validation_rule_name = 'validation_rules_for_create';
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
        return \Redirect::to("admin/{$this->controller_name}/index")
            ->with('message', 'save success');
    }
}