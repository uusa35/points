<?php

namespace App\Models;


class Comment extends PrimaryModel
{
    protected $guarded = [''];

    public function commentable()
    {
        return $this->morphTo();
    }
}
