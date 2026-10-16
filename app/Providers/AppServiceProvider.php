<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production' || str_starts_with((string) config('app.url'), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('ketua_rt', function (User $user) {
            return $user->role === 'ketua_rt';
        });

        Gate::define('admin_media', function (User $user) {
            return $user->role === 'admin_media';
        });

        Gate::define('manage-media', function (User $user) {
            return in_array($user->role, ['admin', 'admin_media']);
        });
    }
}
