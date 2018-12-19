<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function view(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can create images.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuper ? $user->isSuper : $user->user_id === auth()->id();
    }

    /**
     * Determine whether the user can update the image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function update(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can delete the image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function delete(User $user, Image $image)
    {
        return $user->isSuper ? $user->isSuper : $image->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function restore(User $user, Image $image)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Image  $image
     * @return mixed
     */
    public function forceDelete(User $user, Image $image)
    {
        //
    }
}
