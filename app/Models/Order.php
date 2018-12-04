<?php

namespace App\Models;


class Order extends PrimaryModel
{
    protected $guarded = [''];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }
}
