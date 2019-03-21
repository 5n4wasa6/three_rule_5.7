<?php

namespace App\Providers;

// use App\Mypage;
// use App\Policies\Mypage;
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
        // App\Models\Mypage::class => App\Policies\Mypage::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('mypage', function ($user, $user_id) {
            return $user->id == $user_id;
        });
    }
}
