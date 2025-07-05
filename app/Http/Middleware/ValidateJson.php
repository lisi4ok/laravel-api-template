<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

final class ValidateJson
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isJson()) {
            throw new UnsupportedMediaTypeHttpException(
                'Unsupported Media Type'
            );
        }
        if (! $request->wantsJson()) {
            throw new NotAcceptableHttpException(
                'Not Acceptable'
            );
        }

        return $next($request);
    }
}
