<?php

declare(strict_types=1);

use App\Http\Middleware\AddRequestContext;
use App\Http\Middleware\RequestAcceptsJson;
use App\Http\Middleware\SupportsJsonContentType;
use App\Http\Middleware\ValidateJson;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prepend([
            AddRequestContext::class,
            ValidateJson::class,
            //            RequestAcceptsJson::class,
        ]);
        $middleware->append([
            //            SupportsJsonContentType::class,
            //            AddRequestContext::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (HttpExceptionInterface $e) {
            return new JsonResponse([
                'status' => 'error',
                'type' => basename(str_replace('\\', '/', get_class($e))),
                'headers' => $e->getHeaders(),
                'code' => $e->getStatusCode(),
                'message' => $e->getMessage(),
            ], $e->getStatusCode(), [], JSON_PRETTY_PRINT);
        });
    })->create();
