<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    use ApiResponser;

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($credentials)) {
            return $this->error('Email or password is wrong', 401);
        }

        $user = User::where('email', '=', $credentials['email'])->first();
        $token = $user->createToken('moaj-token', ['server:update'])->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];

        return $this->success('User Logged In', 201, $data);
    }

    public function logout(Request $request) {
        $request->user->tokens()->delete();
        // $request->user()->currentAccessToken()->delete();
        return $this->success('User Logged Out');
    }
}
