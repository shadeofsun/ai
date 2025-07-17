<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScenarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'assistant_1_id' => $this->assistant_1_id,
            'assistant_2_id' => $this->assistant_2_id,
            'assistant_3_id' => $this->assistant_3_id,
            'api_key_id' => $this->api_key_id,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'assistants' => [
                'first' => new AssistantResource($this->assistant1),
                'second' => new AssistantResource($this->assistant2),
                'third' => $this->assistant3 ? new AssistantResource($this->assistant3) : null,
            ],
        ];
    }
}