<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Thread;
use App\Http\Resources\MessageResource;
use App\Http\Requests\StoreMessageRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Thread $thread): JsonResponse
    {
        $this->authorize('view', $thread);
        return response()->json(MessageResource::collection($thread->messages));
    }

    public function store(StoreMessageRequest $request, Thread $thread): JsonResponse
    {
        $this->authorize('update', $thread);
        
        $validated = $request->validated();

        $message = $thread->messages()->create(array_merge(
            $validated,
            ['user_id' => auth()->id()]
        ));

        if ($message->assistant_id) {
            $message->load('assistant');
        }

        return response()->json(new MessageResource($message), 201);
    }

    public function show(Thread $thread, Message $message): JsonResponse
    {
        $this->authorize('view', $thread);
        if ($message->assistant_id) {
            $message->load('assistant');
        }
        return response()->json(new MessageResource($message));
    }

    public function destroy(Thread $thread, Message $message): JsonResponse
    {
        $this->authorize('delete', $message);
        $message->delete();
        return response()->json(null, 204);
    }
}