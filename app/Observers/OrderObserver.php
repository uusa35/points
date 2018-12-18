<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        // get the service points cost
        $amount = $order->service->on_sale ? $order->service->sale_points : $order->service->sale_point;
        // check if the current balance > service points cost
        if (request()->user()->balance()->first()->points > $amount) {
            if ($order->is_paid) {
                $amount = $order->service->on_sale ? $order->service->sale_points : $order->service->sale_point;
                $points = $amount > $order->user->balance->points ? $amount : 0;
                $order->user()->balance()->update(['points' => $points]);
            }
        } else {
            $order->update(['is_paid' => false, 'active' => false]);
        }
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
