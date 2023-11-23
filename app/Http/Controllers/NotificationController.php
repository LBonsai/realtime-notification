<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationCreateRequest;
use App\Http\Resources\NotificationResource;
use App\Services\NotificationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    private NotificationService $notificationService;

    /**
     * NotificationController constructor
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * store
     * @param NotificationCreateRequest $request
     * @return NotificationResource
     */
    public function store(NotificationCreateRequest $request): NotificationResource
    {
        $response = $this->notificationService->store($request->validated());
        return new NotificationResource($response);
    }

    /**
     * show
     * @param int $id
     * @return NotificationResource|JsonResponse
     */
    public function show(int $id): NotificationResource|JsonResponse
    {
        try {
            $response = $this->notificationService->show($id);
            return new NotificationResource($response);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage() . '/n' . $e->getTraceAsString());
            return response()->json(['message' => 'User data not found.'], 404);
        }
    }

    /**
     * destroy
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $response = $this->notificationService->destroy($id);
        return response()->json($response['data'], $response['code']);
    }
}
