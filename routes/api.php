<?php

use App\Http\Controllers\Api\ApiKeyController;
use App\Http\Controllers\Api\AssistantController;
use App\Http\Controllers\Api\ScenarioController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // API Keys routes
    Route::apiResource('api-keys', ApiKeyController::class);

    // Assistants routes
    Route::apiResource('assistants', AssistantController::class);

    // Scenarios routes
    Route::apiResource('scenarios', ScenarioController::class);

    // Threads routes
    Route::apiResource('threads', ThreadController::class);

    // Messages routes (nested under threads)
    Route::apiResource('threads.messages', MessageController::class)->except(['update']);
});