<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;

class PrimaryModel extends Model
{
    use LocaleTrait, ModelHelpers;
    protected $localeStrings = [];

}
