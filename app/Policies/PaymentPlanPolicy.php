<?php

namespace App\Policies;

use App\Models\User;
use App\PaymentPlan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the payment plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PaymentPlan  $paymentPlan
     * @return mixed
     */
    public function view(User $user, PaymentPlan $paymentPlan)
    {
        //
    }

    /**
     * Determine whether the user can create payment plans.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->onlySuper;
    }

    /**
     * Determine whether the user can update the payment plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PaymentPlan  $paymentPlan
     * @return mixed
     */
    public function update(User $user, PaymentPlan $paymentPlan)
    {
    }

    /**
     * Determine whether the user can delete the payment plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PaymentPlan  $paymentPlan
     * @return mixed
     */
    public function delete(User $user, PaymentPlan $paymentPlan)
    {
        //
    }

    /**
     * Determine whether the user can restore the payment plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PaymentPlan  $paymentPlan
     * @return mixed
     */
    public function restore(User $user, PaymentPlan $paymentPlan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the payment plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PaymentPlan  $paymentPlan
     * @return mixed
     */
    public function forceDelete(User $user, PaymentPlan $paymentPlan)
    {
        //
    }
}
