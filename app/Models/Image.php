<?php

namespace App\Models;

class Image extends PrimaryModel
{
    protected $guarded = [''];
    protected $localeStrings = ['caption','name'];

    public function imagable()
    {
        return $this->morphTo();
    }


}
