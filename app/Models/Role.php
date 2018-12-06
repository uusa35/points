<?php

namespace App\Models;

class Role extends PrimaryModel
{
    protected $guarded = [''];

    public function users() {
        return $this->hasMany(User::class);
    }
}
