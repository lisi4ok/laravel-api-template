<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

final class JsonExceptionHandler extends Handler // implements ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (HttpExceptionInterface $e) {
            return new JsonResponse([
                'status' => 'error',
                'type' => basename(str_replace('\\', '/', get_class($e))),
                'headers' => $e->getHeaders(),
                'code' => $e->getStatusCode(),
                'message' => $e->getMessage(),
            ], $e->getStatusCode(), [], JSON_PRETTY_PRINT);
        });
    }
}
