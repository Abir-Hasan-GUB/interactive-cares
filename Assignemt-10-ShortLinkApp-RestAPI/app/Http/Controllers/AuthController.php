<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public  function login(LoginRequest $request){
    $user = User::where("email", $request->email)->first();

    if(!$user || ! Hash::check($request->password, $user->password)){
        return response()->json([
            'message' => 'Given Credentials are incorrect!'
        ], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token'=> $token,
        'token_type' => 'Bearer'
    ], 200);

    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout Successfully!'
        ], 200);
    }
}
