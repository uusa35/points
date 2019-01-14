<?php

namespace App\Observers;

use App\Mail\OrderComplete;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

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
        $serviceCost = $order->service->on_sale ? $order->service->sale_points : $order->service->points;
        // check if the current balance > service points cost
        $userBalance = $order->client->balance->points;
        if ($userBalance > $serviceCost && ($userBalance - $serviceCost > 0)) {
            $client = $order->client()->first();
            $finalBalance = $userBalance - $serviceCost;
            $client->balance()->first()->update(['points' => $finalBalance]);
            $order->update(['is_paid' => true]);
            // automatically create a job once order is paid
            $order->job()->create();
            $settings = Setting::first();
            return Mail::to($client->email)->cc($settings->info_email)->cc($settings->sales_email)->send(new OrderComplete($order, $client));

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
