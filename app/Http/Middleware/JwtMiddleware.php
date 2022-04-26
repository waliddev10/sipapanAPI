<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        // return response()->json($token);

        if (!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'message' => 'Access_token tidak disediakan.'
            ], Response::HTTP_UNAUTHORIZED);
        }


        try {
            $credential = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        } catch (ExpiredException $e) {
            return response()->json([
                'message' => 'Access_token kedaluwarsa.'
            ], Response::HTTP_BAD_REQUEST);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Terjadi masalah saat encode access_token.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $admin = Admin::find($credential->sub);

        if (!$admin)
            return response()->json([
                'message' => 'Access_token tidak valid.'
            ], Response::HTTP_UNAUTHORIZED);

        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $admin;

        return $next($request);
    }
}
