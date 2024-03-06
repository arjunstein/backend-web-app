<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->only('email', 'password');

        if (!Auth::attempt($user)) {
            return response()->json([
                'message' => 'Authentication is invalid',
                'errors' =>  [
                    "root" => "Could not sign in with those details"
                ]
            ], 422);
        }

        $accessToken = Auth::user()->createToken('access_token')->accessToken;

        return response()->json(
            [
                'message' => 'Success',
                'data' => Auth::user(),
                'meta' => [
                    'token' => $accessToken
                ]
            ],
            200
        )->header("content-type", "application/json");
    }

    public function logout()
    {
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'Logged out'
        ], 200)->header("Content-Type", "application/json");
    }
}
