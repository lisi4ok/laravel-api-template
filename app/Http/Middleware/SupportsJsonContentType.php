<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

final class SupportsJsonContentType
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isJson()) {
            throw new UnsupportedMediaTypeHttpException(
                'Unsupported Media Type'
            );
        }

        return $response = $next($request);

        //        if ($response instanceof JsonResponse && $request->query('pretty') == true) {
        //            return $response->setEncodingOptions(JSON_PRETTY_PRINT);
        //        }
        //
        //        return $response;
    }
}
