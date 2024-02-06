<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\ClassRoom;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\User;
use App\Policies\ClassPolicy;
use App\Policies\ExamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ClassRoom::class => ClassPolicy::class,
        Exam::class => ExamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("users.show", function (User $user, User $user2): bool {
            // dd($user->role, $user2->role);
            return (bool) ($user->role == 1 || $user->role == 2 ||
                ($user->role == 4 && $user2->parent_id === $user->id)
                || $user2->id == $user->id);
        });
        Gate::define("subjects.create", function (User $user): bool {
            return (bool) ($user->role == 1);
        });
        Gate::define("classes.create", function (User $user): bool {
            return (bool) ($user->role == 1);
        });
    }
}
