<?php

namespace App\Policies;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubjectPolicy
{

    public function create(User $user): bool
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subject $subject): bool
    {
        return ($user->role === 1 || $subject->teacher_id === $user->id);
    }

    public function delete(User $user, Subject $subject): bool
    {
        return $user->role === 1;
    }

}
