<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\Setting;
use App\Models\User;
use App\Models\Version;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\HandlesAuthorization;

class VersionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the version.
     *
     * @param  \App\Models\User $user
     * @param  \App\Version $version
     * @return mixed
     */
    public function view(User $user, Version $version)
    {
        //
    }

    /**
     * Determine whether the user can create versions.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(?User $user, Job $job)
    {
        // if the designer is included within the job designers array
        $settings = Setting::first();
        if ($job->versions()->count() <= $settings->service_versions_limit && !auth()->user()->isSuper) {
            return auth()->user()->isSuper ? auth()->user()->isSuper : in_array(auth()->id(), $job->designers()->pluck('id')->toArray(), true);
        }
        throw new AuthorizationException(trans("message.versions_limit_exceed"));

    }

    /**
     * Determine whether the user can update the version.
     *
     * @param  \App\Models\User $user
     * @param  \App\Version $version
     * @return mixed
     */
    public function update(User $user, Version $version)
    {
        //
    }

    /**
     * Determine whether the user can delete the version.
     *
     * @param  \App\Models\User $user
     * @param  \App\Version $version
     * @return mixed
     */
    public function delete(User $user, Version $version)
    {
        //
    }

    /**
     * Determine whether the user can restore the version.
     *
     * @param  \App\Models\User $user
     * @param  \App\Version $version
     * @return mixed
     */
    public function restore(User $user, Version $version)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the version.
     *
     * @param  \App\Models\User $user
     * @param  \App\Version $version
     * @return mixed
     */
    public function forceDelete(User $user, Version $version)
    {
        //
    }
}
