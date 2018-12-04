<?php

namespace App\Models;

class Transaction extends PrimaryModel
{
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_plan()
    {
        return $this->belongsTo(PaymentPlan::class);
    }
}
