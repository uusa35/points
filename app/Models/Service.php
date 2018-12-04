<?php

namespace App\Models;


class Service extends PrimaryModel
{
    protected $guarded = [''];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
