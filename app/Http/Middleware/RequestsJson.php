<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

final class RequestsJson
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->wantsJson()) {
            throw new NotAcceptableHttpException('Not Acceptable');
        }

        if (!$request->isJson()) {
            throw new UnsupportedMediaTypeHttpException('Unsupported Media Type');
        }

        return $next($request);
    }
}
