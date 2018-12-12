<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Role extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['slug'];

    public function users() {
        return $this->hasMany(User::class);
    }
}
