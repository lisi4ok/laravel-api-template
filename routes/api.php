<?php

declare(strict_types=1);

use App\Http\Middleware\AuthenticateOnceWithBasicAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API']);
});
//
// Route::post('/login', function (Request $request) {
//    $credentials = $request->only(['email', 'password']);
//    if (Auth::attempt($credentials)) {
//        $user = $request->user();
//        $token = $user->createToken('My Token')->accessToken;
//        return response()->json(['access_token' => $token]);
//    }
//    return response()->json(['error' => 'Unauthorized'], 401);
// });
//
// Route::middleware('auth:api')->group(function () {
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    });
// });
//
//
// Route::get('/test', function () {
//
//
// })->middleware(AuthenticateOnceWithBasicAuth::class);
