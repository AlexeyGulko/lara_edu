<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->owner->id;
    }

    public function show(User $user, Post $post)
    {
        return $post->published
            || ($user->id === $post->owner->id);
    }
}
