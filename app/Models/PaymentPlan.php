<?php

namespace App\Models;


use App\Services\Traits\LocaleTrait;

class PaymentPlan extends PrimaryModel
{
    use LocaleTrait;
    protected $guarded = [''];
    protected $localeStrings = ['slug','description'];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function getPriceWithBonusAttribute() {
        return $this->price + $this->bonus;
    }

}
