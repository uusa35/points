<?php

namespace App\Models;

use App\Services\Traits\LocaleTrait;

class Role extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['slug'];
    protected $casts = [
        'is_designer' => 'boolean',
        'is_client' => 'boolean',
        'is_super' => 'boolean',
        'is_admin' => 'boolean',
    ];

    public function privileges()
    {
        return $this->belongsToMany(Privilege::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
