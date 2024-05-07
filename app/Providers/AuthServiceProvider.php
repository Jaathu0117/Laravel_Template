<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User as ModelsUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use PhpParser\Builder\Function_;
use User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('view', function(User $user){
            return $user->isAdmin();
        });
    }
}
