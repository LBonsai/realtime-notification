<?php

namespace App\Services;

use App\Events\NotificationCreatedEvent;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\User;

class NotificationService
{
    /**
     * store
     * @param array $params
     * @return mixed
     */
    public function store(array $params): mixed
    {
        $notification = Notification::create([
            'message' => $params['message']
        ]);

        $users = User::all();
        $notification->users()->attach($users);

        broadcast(new NotificationCreatedEvent())->toOthers();

        return $notification;
    }

    /**
     * destroy
     * @param int $notificationId
     * @return array
     */
    public function destroy(int $notificationId): array
    {
        $userId = auth()->user()->id;
        $notificationUser = NotificationUser::where('user_id', $userId)
            ->where('notification_id', $notificationId)
            ->first();

        if ($notificationUser) {
            auth()->user()->notifications()->detach($notificationId);
            return [
                'code' => 200,
                'data' => [
                    'message' => 'Notification deleted successfully'
                ]
            ];
        } else {
            return [
                'code' => 404,
                'data' => [
                    'message' => 'Notification was not found'
                ]
            ];
        }
    }
}
