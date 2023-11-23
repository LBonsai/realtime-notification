<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * store
     * @param array $params
     * @return mixed
     */
    public function store(array $params)
    {
        return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
            'is_enable_notification' => true
        ]);
    }

    /**
     * show
     * @param int $userId
     * @return mixed
     */
    public function show(int $userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * updateNotificationSettings
     * @param array $params
     * @return mixed
     */
    public function updateNotificationSettings(array $params)
    {
        $user = auth()->user();

        $user->update([
            'is_enable_notification' => (int)$params['is_enable_notification'],
        ]);

        return $user;
    }
}
