<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Slider extends PrimaryModel
{
    use ModelHelpers, LocaleTrait;
    protected $localeStrings = ['caption'];
    protected $guarded = [''];
}
