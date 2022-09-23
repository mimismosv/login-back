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

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            //'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }
}
