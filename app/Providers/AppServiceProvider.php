<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Auth\JwtGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::enablePasswordGrant();
        //
        //        Auth::viaRequest('custom-token', function (Request $request) {
        //            return User::where('token', (string) $request->token)->first();
        //        });
        //
        //        Auth::extend('jwt', function (Application $app, string $name, array $config) {
        //            // Return an instance of Illuminate\Contracts\Auth\Guard...
        //
        //            return new JwtGuard(Auth::createUserProvider($config['provider']));
        //        });
    }
}
