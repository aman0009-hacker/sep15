<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Auth;

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
        // if(auth()->check() && auth()->user()->is_verified) {
        //     //return redirect()->route('home');
        //     dd(auth()->user()->is_verified);
        // }
        // else 
        // {
        //     dd("hjkhhkj");
        // }

        $this->registerPolicies();

        Auth::provider('custom', function ($app, array $config) {

            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new CustomUserProvider();
        });
    }
}
