<?php

namespace App\Services;

use App\Events\NotificationCreatedEvent;
use App\Models\Notification;
use App\Models\User;

class NotificationService
{
    /**
     * store
     * @param array $params
     * @return mixed
     */
    public function store(array $params)
    {
        $notification = Notification::create([
            'message' => $params['message']
        ]);

        $users = User::all();
        $notification->users()->attach($users);

        broadcast(new NotificationCreatedEvent())->toOthers();

        return $notification;
    }
}
