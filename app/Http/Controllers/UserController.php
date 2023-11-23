<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationSettingsEditRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * UserController constructor
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * store
     * @param UserCreateRequest $request
     * @return UserResource
     */
    public function store(UserCreateRequest $request): UserResource
    {
        $response = $this->userService->store($request->validated());
        return new UserResource($response);
    }

    /**
     * show
     * @param int $id
     * @return UserResource|JsonResponse
     */
    public function show(int $id): UserResource|JsonResponse
    {
        try {
            $response = $this->userService->show($id);
            return new UserResource($response);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . '/n' . $e->getTraceAsString());
            return response()->json(['message' => 'User data not found.'], 404);
        }
    }

    /**
     * show
     * @param int $userId
     * @return UserResource|JsonResponse
     */
    public function notifications(int $userId): UserResource|JsonResponse
    {
        try {
            $response = $this->userService->show($userId);
            return new UserResource($response);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . '/n' . $e->getTraceAsString());
            return response()->json(['message' => 'User data not found.'], 404);
        }
    }

    /**
     * @param NotificationSettingsEditRequest $request
     * @return UserResource
     */
    public function updateNotificationSettings(NotificationSettingsEditRequest $request): UserResource
    {
        $response = $this->userService->updateNotificationSettings($request->validated());
        return new UserResource($response);
    }
}
