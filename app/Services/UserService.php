<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * store
     * @param array $userData
     * @return mixed
     */
    public function store(array $userData)
    {
        return UserModel::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
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
        return UserModel::findOrFail($userId);
    }
}
