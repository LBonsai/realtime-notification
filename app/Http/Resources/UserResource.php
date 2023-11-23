<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_enable_notification' => (bool)$this->is_enable_notification,
            'created_at' => $this->created_at
        ];

        if ($request->routeIs('user.notifications')) {
            $data['notifications'] = NotificationResource::collection($this->notifications);
        }

        return $data;
    }
}
