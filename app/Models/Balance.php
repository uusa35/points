<?php

namespace App\Models;

class Balance extends PrimaryModel
{
    protected $guarded = [''];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
