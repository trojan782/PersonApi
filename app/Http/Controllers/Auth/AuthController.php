<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
            // 'expires_in' => auth()->factory()->getTTL() * 60,

        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required | min:4',
            'email' => 'required  | string | email',
            'password' => 'required | min:6 '
        ]);

        $user = User::create($request->all());

        return response([
            'message' => 'User has been created succcessfully!',
            'user' => $user
        ], 201);
    }
}
