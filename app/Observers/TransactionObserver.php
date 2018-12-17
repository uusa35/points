<?php

namespace App\Observers;

use App\Transaction;

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
            $points = $paymentPlan->apply_bouns ? $paymentPlan->priceWithBonus : $paymentPlan->price;
            $transaction->user()->balance()->update(['points' => $points]);
            dd($transaction);
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
