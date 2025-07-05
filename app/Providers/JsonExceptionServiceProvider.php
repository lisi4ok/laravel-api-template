<?php

declare(strict_types=1);

namespace App\Providers;

use App\Exceptions\JsonExceptionHandler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;

final class JsonExceptionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            ExceptionHandler::class,
            JsonExceptionHandler::class
        );
    }

    public function boot(): void
    {
    }
}
