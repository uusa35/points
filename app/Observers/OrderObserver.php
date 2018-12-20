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
        $serviceCost = $order->service->on_sale ? $order->service->sale_points : $order->service->sale_point;
        // check if the current balance > service points cost
        if (auth()->user()->balance()->first()->points > $serviceCost) {
            $balance = $order->client->balance->points;
            $finalBalance = $balance - $serviceCost;
            $order->client()->first()->balance()->first()->update(['points' => $finalBalance]);
            $order->update(['is_paid' => true]);
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
