<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param  \App\Models\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        if(!$user->isAdminOrAbove) {
            if($user->onlyClient) {
                return $user->id === $order->user_id;
            } elseif($user->onlyDesigner) {
                return in_array($user->id, $order->job()->first()->designers()->pluck('id')->toArray(), true);
            }
        }
        return $user->isAdminOrAbove;
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdminOrAbove ? $user->isAdminOrAbove : $user->onlyClient;
    }

    /**
     * Determine whether the user can update the order.
     *
     * @param  \App\Models\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return $user->isAdmin ? $user->isAdmin : $user->isClient;
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @param  \App\Models\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the order.
     *
     * @param  \App\Models\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the order.
     *
     * @param  \App\Models\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        return $user->isAdmin;
    }
}
