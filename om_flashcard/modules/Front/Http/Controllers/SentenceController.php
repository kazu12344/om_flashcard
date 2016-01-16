<?php namespace Modules\Front\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use App\Traits\BasicDataRegistrationPageLogic;
use Modules\Front\Http\Requests\SentencePostEditRequest;
use App\Models\SentenceGroup;
use App\Models\Sentence;
use App\Models\User;

class SentenceController extends BaseController
{

    use BasicDataRegistrationPageLogic;

    /**
     * @return \Illuminate\View\View
     */
    public function getCreate() {
        return $this->getEdit();
    }

    /**
     * @param $sentence_group_id
     * @return \Illuminate\View\View
     */
    public function getEdit($sentence_group_id = null) {
        // Get registered language data
        $user_id = \Auth::front()->user()->id;
        $user = User::find($user_id);
        $registered_language = User::getRegisterdLanguageData($user);
        $view_data = $registered_language;

        // Get sentences data
        $native_language_sentences = Sentence::getSentenceData(
            $sentence_group_id,
            array_keys($registered_language['native_languages'])
        );
        $practicing_language_sentences = Sentence::getSentenceData(
            $sentence_group_id,
            array_keys($registered_language['practicing_languages'])
        );
        $view_data['native_language_sentence'] = $native_language_sentences;
        $view_data['practicing_language_sentence'] = $practicing_language_sentences;
        $view_data['sentence_group_id'] = $sentence_group_id;

        // Render view
        return view('front::sentence.edit', $view_data);
    }

    /**
     * @param SentencePostEditRequest $request
     * @return mixed
     */
    public function postCreate(SentencePostEditRequest $request)
    {
        $sentence = new Sentence();
        $sentence->fill(\Input::all());
        if (!$sentence->createSentence()) {
            return \Redirect::back()
                ->with('error_message', trans('message.saving_failure'));
        }
        return \Redirect::to('user/index')
            ->with('message',  trans('message.saving_success'));
    }

    /**
     * @param SentencePostEditRequest $request
     * @return mixed
     */
    public function postEdit(SentencePostEditRequest $request)
    {
        $sentence_group_id = $request->input('sentence_group_id');
        $language_id = $request->input('language_id');
        $sentence = Sentence::getSentenceData($sentence_group_id, $language_id);
        if (!$sentence) {
            $sentence = new Sentence();
        }
        $sentence->fill(\Input::all());
        if (!$sentence->save()) {
            return \Redirect::back()
                ->with('error_message', trans('message.saving_failure'));
        }
        return \Redirect::to('user/index')
            ->with('message',  trans('message.saving_success'));
    }

}