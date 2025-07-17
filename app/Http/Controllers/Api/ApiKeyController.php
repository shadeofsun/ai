<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use App\Http\Resources\ApiKeyResource;
use App\Http\Requests\StoreApiKeyRequest;
use App\Http\Requests\UpdateApiKeyRequest;
use Illuminate\Http\JsonResponse;

class ApiKeyController extends Controller
{
    public function index(): JsonResponse
    {
        $apiKeys = auth()->user()->apiKeys;
        return response()->json(ApiKeyResource::collection($apiKeys));
    }

    public function store(StoreApiKeyRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $apiKey = auth()->user()->apiKeys()->create($validated);
        return response()->json(new ApiKeyResource($apiKey), 201);
    }

    public function show(ApiKey $apiKey): JsonResponse
    {
        $this->authorize('view', $apiKey);
        return response()->json(new ApiKeyResource($apiKey));
    }

    public function update(UpdateApiKeyRequest $request, ApiKey $apiKey): JsonResponse
    {
        $this->authorize('update', $apiKey);
        
        $validated = $request->validated();

        $apiKey->update($validated);
        return response()->json(new ApiKeyResource($apiKey));
    }

    public function destroy(ApiKey $apiKey): JsonResponse
    {
        $this->authorize('delete', $apiKey);
        $apiKey->delete();
        return response()->json(null, 204);
    }
}