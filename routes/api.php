<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)->only([
    'store', 'show'
]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::get('users/{user}/notifications', [UserController::class, 'notifications'])->name('user.notifications');
    Route::put('users/notification-settings', [UserController::class, 'updateNotificationSettings']);

    Route::apiResource('notifications', NotificationController::class)->only([
        'store', 'show', 'destroy'
    ]);
});
