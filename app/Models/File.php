<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class File extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['name','caption'];

    public function filable()
    {
        return $this->morphTo();
    }
}