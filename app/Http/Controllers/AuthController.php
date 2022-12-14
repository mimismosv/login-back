<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\{User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash, Password};
use Illuminate\Support\{Carbon, Str};
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
/**
 * It takes the email and password from the request, validates them, and then attempts to authenticate
 * the user. If the authentication fails, it returns a 401 response. If it succeeds, it returns a 200
 * response with the user's token.
 */
    public function login()
    {
        $validated = request()->validate([
            'email'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $validated = array_merge($validated);

        if (!$token = auth()->attempt($validated)) {
            return response()->json(['message' => 'Sorry, the email or password is incorrect.'], Response::HTTP_UNAUTHORIZED);
        }

       // event(new UserLoginEvent(auth()->user()));

        return $this->respondWithToken($token);
    }

/**
 * It logs the user out
 */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

/**
 * It returns a JSON response with the access token, token type, and expiration time
 *
 * @param token The JWT token
 */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }
}
