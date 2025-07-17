<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'message_id' => $this->message_id,
            'type' => $this->type,
            'content' => $this->content,
            'thread_id' => $this->thread_id,
            'assistant_id' => $this->assistant_id,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'assistant' => $this->when($this->assistant_id, fn() => new AssistantResource($this->assistant)),
        ];
    }
}