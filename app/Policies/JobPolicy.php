<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Models\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job.
     *
     * @param  \App\Models\User $user
     * @param  \App\Job $job
     * @return mixed
     */
    public function view(User $user, Job $job)
    {
        if ($user->isAdminOrAbove) {
            return $user->isAdminOrAbove;
        } elseif ($user->onlyClient) {
            return $user->id === $job->order->user_id;
        } elseif ($user->onlyDesigner) {
            return in_array($user->id(), $job->designers()->pluck('id')->toArray(), true);
        }
    }

    /**
     * Determine whether the user can create jobs.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user, Order $order)
    {
        !$order->job ? $user->onlyDesigner : false;
    }

    /**
     * Determine whether the user can update the job.
     *
     * @param  \App\Models\User $user
     * @param  \App\Job $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        if (auth()->user()->onlyClient) {
            return auth()->id() === $job->order->user_id;
        } elseif (auth()->user()->onlyDesigner) {
            return in_array(auth()->id(), $job->designers()->pluck('id')->toArray(), true);
        }
    }

    /**
     * Determine whether the user can delete the job.
     *
     * @param  \App\Models\User $user
     * @param  \App\Job $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        //
    }

    /**
     * Determine whether the user can restore the job.
     *
     * @param  \App\Models\User $user
     * @param  \App\Job $job
     * @return mixed
     */
    public function restore(User $user, Job $job)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the job.
     *
     * @param  \App\Models\User $user
     * @param  \App\Job $job
     * @return mixed
     */
    public function forceDelete(User $user, Job $job)
    {
        //
    }
}
