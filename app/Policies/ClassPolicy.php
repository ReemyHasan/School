<?php

namespace App\Policies;

use App\Models\ClassRoom;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClassPolicy
{

    public function view(User $user, ClassRoom $classRoom): bool
    {
        if($user->role === 4)
        {
            $myStudents = $user->myStudent->toArray();
            foreach ($myStudents as $student)
            {
                if($student->class_id === $classRoom->id)
                  return true;
            }
            return false;
        }
        return (
            $user->role === 1 || $user->role === 2 ||
            $user->class_id === $classRoom->id
        );
    }

    public function create(User $user): bool
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClassRoom $classRoom): bool
    {
        return $user->role === 1;
    }

    public function delete(User $user, ClassRoom $classRoom): bool
    {
        return $user->role === 1;
    }


}
