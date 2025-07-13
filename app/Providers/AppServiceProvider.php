<?php

namespace App\Providers;

use App\Models\Talk;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //general authorization not bound to a model
        // Gate::define('update-talk', function(User $user, Talk $talk){
        //     return $user->id === $talk->user_id;
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
