<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    public function create(User $user): bool
    {
        return $user->role === 1;
    }


    public function restore(User $user, User $model): bool
    {
        return $user->role === 1;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === 1;

    }
}
