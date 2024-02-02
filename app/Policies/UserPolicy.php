<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    public function view(User $user): bool
    {
        return (
            Auth::user()->role === 1|| Auth::user()->role === 2||
             ( Auth::user()->role === 4  && $user->parent_id === Auth::user()->id)
        );
    }

    public function create(User $user): bool
    {
        return Auth::user()->role === 1;
    }

}
