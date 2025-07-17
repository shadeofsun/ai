<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Http\Resources\ThreadResource;
use App\Http\Requests\StoreThreadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(): JsonResponse
    {
        $threads = auth()->user()->threads()->with(['messages', 'assistant', 'scenario'])->get();
        return response()->json(ThreadResource::collection($threads));
    }

    public function store(StoreThreadRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $thread = auth()->user()->threads()->create($validated);
        $thread->load(['assistant', 'scenario']);
        return response()->json(new ThreadResource($thread), 201);
    }

    public function show(Thread $thread): JsonResponse
    {
        $this->authorize('view', $thread);
        $thread->load(['messages', 'assistant', 'scenario']);
        return response()->json(new ThreadResource($thread));
    }

    public function update(Request $request, Thread $thread): JsonResponse
    {
        $this->authorize('update', $thread);
        
        $validated = $request->validate([
            'metadata' => 'nullable|json',
        ]);

        $thread->update($validated);
        return response()->json(new ThreadResource($thread));
    }

    public function destroy(Thread $thread): JsonResponse
    {
        $this->authorize('delete', $thread);
        $thread->delete();
        return response()->json(null, 204);
    }
}