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
    protected $fillable = ['title', 'text', 'language_id', 'sentence_group_id'];

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

    /**
     * Override
     */
//    public function save(array $options = [])
//    {
//        // controller name
//        // create
//        // sentence_group insert
//        // sentence insert
//        $sentence_group = new SentenceGroup();
//        $sentence_group->save();
//        $this->fill(['sentence_group_id' => $sentence_group->id]);
//        parent::save();
//
//        // edit
//        // sentence update
//    }

    public function createSentence()
    {
        return \DB::transaction(function(){
            try {
                $sentence_group = new SentenceGroup;
                $sentence_group->save();
                $this->fill(['sentence_group_id' => $sentence_group->id]);
                parent::save();
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    public static function getSentenceData($sentence_group_id, $language_ids, $options = array())
    {
        if (!is_array($language_ids)) {
            $language_ids = [$language_ids];
        }
        $default = [
            'result_type' => ''
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

