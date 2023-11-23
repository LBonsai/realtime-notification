<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * login
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        $userCredentials = Arr::only($credentials, ['email', 'password']);
        if (!Auth::attempt($userCredentials)) {
            return [
                'code' => 401,
                'data' => [
                    'error' => 'Invalid credentials'
                ]
            ];
        }

        $user = User::where('email', $userCredentials['email'])->first();
        $token = $user->createToken('auth-token')->plainTextToken;

        return [
            'code' => 200,
            'data' => [
                'token' => $token,
                'user' => $user
            ]
        ];
    }
}
