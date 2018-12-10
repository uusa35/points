<?php

use App\Models\PaymentPlan;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class PaymentPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentPlan::class, 3)->create()->each(function ($p) {
            $p->transactions()->saveMany(factory(Transaction::class,app()->environment('production') ? 1 : 50)->create());
        });
    }
}
