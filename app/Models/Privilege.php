<?php

namespace App\Models;


class Privilege extends PrimaryModel
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
