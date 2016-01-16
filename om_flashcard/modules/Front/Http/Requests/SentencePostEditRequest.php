<?php namespace Modules\Front\Http\Requests;

use App\Helpers\OmUrlHelper;
use Illuminate\Foundation\Http;
use App\Models\Sentence;
class SentencePostEditRequest extends \Illuminate\Foundation\Http\FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $sentence = new Sentence();
        $validation_rules = [];
        $action_name = OmUrlHelper::getActionName();
        if ($action_name = 'postEdit') {
            $validation_rules = $sentence->getValidationRules('validation_rules_for_edit');
        } elseif ($action_name = 'postCreate') {
            $validation_rules = $sentence->getValidationRules('validation_rules_for_create');
        }
        return $validation_rules;
    }

}
