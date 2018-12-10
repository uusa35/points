<?php

namespace App\Models;


class PaymentPlan extends PrimaryModel
{
    protected $guarded = [''];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function getPriceWithBonusAttribute() {
        return $this->price + $this->bonus;
    }

}
