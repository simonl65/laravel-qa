<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Is user authz to edit this question?:
        \Gate::define('update-question', function($user, $question) {
            // Match current user with tha of the question:
            return $user->id == $question->user_id;
        });

        // Is user authz to delete this quetsion?:
        \Gate::define('delete-question', function($user, $question) {
            // Match current user with tha of the question:
            return $user->id == $question->user_id;
        });
    }
}
