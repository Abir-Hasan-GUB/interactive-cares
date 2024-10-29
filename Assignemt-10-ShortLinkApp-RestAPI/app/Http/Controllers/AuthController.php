<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Given Credentials are incorrect!',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Login Successfully!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout Successfully!',
        ], 200);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'User Creation Failed!',
            ], 500);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'      => 'User Created Successfully!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 201);
    }
}
