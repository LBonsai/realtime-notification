<?php

namespace App\Services;

use App\Events\OfflineUserEvent;
use App\Events\OnlineUserEvent;
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

        broadcast(new OnlineUserEvent($user))->toOthers();

        return [
            'code' => 200,
            'data' => [
                'token' => $token,
                'user' => $user
            ]
        ];
    }

    /**
     * logout
     * @param object $request
     * @return void
     */
    public function logout(object $request): void
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        broadcast(new OfflineUserEvent($user))->toOthers();
    }
}
