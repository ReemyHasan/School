<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExamPolicy
{
    public function create(User $user): bool
    {
        return $user->role === 1;
    }
    public function update(User $user, Exam $exam): bool
    {
        return ($user->role == 1 || $user->id == $exam->subject->teacher_id);

    }

    public function delete(User $user, Exam $exam): bool
    {
        return $user->role === 1;

    }

}
