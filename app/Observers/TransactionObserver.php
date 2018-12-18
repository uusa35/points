<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the transaction "created" event.
     *
     * @param  \App\Transaction $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "updated" event.
     *
     * @param  \App\Transaction $transaction
     * @return void
     */
    public function updated(Transaction $transaction)
    {
        if ($transaction->is_complete) {
            $paymentPlan = $transaction->payment_plan;
            $points = $paymentPlan->apply_bonus ? $paymentPlan->priceWithBonus : $paymentPlan->price;
            $currentBalance = $transaction->user()->first()->balance()->first();
            $currentBalance->update(['points' => $points + $currentBalance->points]);
        }
    }

    /**
     * Handle the transaction "deleted" event.
     *
     * @param  \App\Transaction $transaction
     * @return void
     */
    public function deleted(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "restored" event.
     *
     * @param  \App\Transaction $transaction
     * @return void
     */
    public function restored(Transaction $transaction)
    {
        //
    }

    /**
     * Handle the transaction "force deleted" event.
     *
     * @param  \App\Transaction $transaction
     * @return void
     */
    public function forceDeleted(Transaction $transaction)
    {
        //
    }
}
