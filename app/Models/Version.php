<?php

namespace App\Models;


class Version extends PrimaryModel
{
    protected $guarded = [''];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
