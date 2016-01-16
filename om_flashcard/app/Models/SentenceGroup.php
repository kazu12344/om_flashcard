<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentenceGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sentence_groups';

    /**
     * soft delete setting
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * Define many to many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentences()
    {
        return $this->hasMany('App\Models\Sentence');
    }
}
