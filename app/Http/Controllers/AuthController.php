<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{

    protected function jwt(Request $request, $uuid, Admin $admin)
    {
        $payload = [
            'iss' => $request->getUri(), // Issuer of the token
            'iat' => time(), // issued at - Time when JWT was issued. 
            'exp' => time() + 60 * 60 * 24 * 7, // Expiration time
            'nbf' => time(), // Not valid before. 
            'jti' => $uuid,
            'sub' => $admin->id, // Subject of the token
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'message' => 'Email tidak terdaftar.'
            ], Response::HTTP_BAD_REQUEST);
        }

        if (Hash::check($request->password, $admin->password)) {
            $uuid = Uuid::uuid4();

            return response()->json([
                'message' => 'Login berhasil.',
                'access_token' => $this->jwt($request, $uuid, $admin),
                'token_type' => 'Bearer',
                'admin' => $admin,
                'expires_in' => 60 * 60 * 24 * 7
            ], Response::HTTP_OK);
        }

        // Bad Request response
        return response()->json([
            'message' => 'Email atau password salah.'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function me(Request $request)
    {
        return response()->json($request->auth, Response::HTTP_OK);
    }

    public function refresh(Request $request)
    {
        $uuid = Uuid::uuid4();

        return response()->json([
            'message' => 'Refresh token berhasil.',
            'access_token' => $this->jwt($request, $uuid, $request->auth),
            'token_type' => 'Bearer',
            'admin' => $request->auth,
            'expires_in' => time() + 60 * 60
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Logout berhasil.'
        ], Response::HTTP_OK);
    }
}
