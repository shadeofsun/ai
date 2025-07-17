<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Http\Resources\AssistantResource;
use App\Http\Requests\StoreAssistantRequest;
use App\Http\Requests\UpdateAssistantRequest;
use Illuminate\Http\JsonResponse;

class AssistantController extends Controller
{
    public function index(): JsonResponse
    {
        $assistants = auth()->user()->assistants;
        return response()->json(AssistantResource::collection($assistants));
    }

    public function store(StoreAssistantRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $assistant = auth()->user()->assistants()->create($validated);
        return response()->json(new AssistantResource($assistant), 201);
    }

    public function show(Assistant $assistant): JsonResponse
    {
        $this->authorize('view', $assistant);
        return response()->json(new AssistantResource($assistant));
    }

    public function update(UpdateAssistantRequest $request, Assistant $assistant): JsonResponse
    {
        $this->authorize('update', $assistant);
        
        $validated = $request->validated();

        $assistant->update($validated);
        return response()->json(new AssistantResource($assistant));
    }

    public function destroy(Assistant $assistant): JsonResponse
    {
        $this->authorize('delete', $assistant);
        $assistant->delete();
        return response()->json(null, 204);
    }
}