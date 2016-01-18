<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sentences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'text', 'language_id', 'sentence_group_id'];

    /**
     * soft delete setting
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * validation rules for user create
     *
     * @var array
     */
    protected $validation_rules_for_create = [
        'title' => 'required',
        'text' => 'required',
        'language_id' => 'required',
    ];

    /**
     * validation rules for user create
     *
     * @var array
     */
    protected $validation_rules_for_edit = [
        'title' => 'required',
        'text' => 'required',
        'language_id' => 'required',
        'sentence_group_id' => 'required',
    ];

    public function language_user()
    {
        return $this->hasOne('App\Models\LanguageUser');
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function createSentence($user_id)
    {
        return \DB::transaction(function() use ($user_id){
            try {
                $sentence_group = new SentenceGroup;
                $sentence_group->user_id = $user_id;
                $sentence_group->save();
                $this->fill([
                    'sentence_group_id' => $sentence_group->id,
                    'user_id' => $user_id,
                ]);
                parent::save();
                return $sentence_group;
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    /**
     * Get data for sentence/index page
     *
     * @param $user_id
     * @return array
     */
    public static function getSentencesDataForIndexView($user_id)
    {
        $data = [];
        $sentence_group = new SentenceGroup();
        $data['sentence_groups'] = $sentence_group::where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $sentence_group_ids = [];
        foreach ($data['sentence_groups'] as $sentence_group) {
            $sentence_group_ids[] = $sentence_group->id;
        }

        $sentences = \DB::table('sentences')
            ->select(
                'sentences.sentence_group_id',
                'sentences.title',
                'languages.string as language',
                'language_user.is_native_language',
                'sentences.created_at',
                'sentences.updated_at'
            )
            ->leftJoin('language_user', function($join){
                $join->on('sentences.user_id', '=', 'language_user.user_id')
                    ->on('sentences.language_id', '=', 'language_user.language_id');
            })
            ->leftJoin('languages', 'language_user.language_id', '=','languages.id')
            ->where('sentences.user_id', $user_id)
            ->whereIN('sentences.sentence_group_id', $sentence_group_ids)
            ->orderBy('sentence_group_id', 'desc')
            ->orderBy('language_user.is_native_language', 'desc')
            ->orderBy('languages.code', 'asc')
            ->get();
        $data['sentences'] = [];
        foreach ($sentences as $sentence) {
            $data['sentences'][$sentence->sentence_group_id][] = $sentence;
        }
        return $data;
    }

    /**
     * @param $sentence_group_id
     * @param $language_ids
     * @param array $options
     * @return mixed
     */
    public static function getSentenceData($sentence_group_id, $language_ids, $options = array())
    {
        if (!is_array($language_ids)) {
            $language_ids = [$language_ids];
        }
        $default = [
            'result_type' => '',
        ];
        $options = array_merge($default, $options);
        $sentence = Sentence::where('sentence_group_id', $sentence_group_id)
            ->whereIn("language_id", $language_ids);
        if ($options['result_type'] === 'all') {
            $sentence = $sentence->get();
        } else {
            $sentence = $sentence->first();
        }
        return $sentence;
    }
}

