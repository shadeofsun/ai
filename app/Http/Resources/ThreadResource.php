<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'thread_id' => $this->thread_id,
            'assistant_id' => $this->assistant_id,
            'scenario_id' => $this->scenario_id,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'messages' => MessageResource::collection($this->whenLoaded('messages')),
            'assistant' => new AssistantResource($this->whenLoaded('assistant')),
            'scenario' => new ScenarioResource($this->whenLoaded('scenario')),
        ];
    }
}