<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssistantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'assistant_id' => $this->assistant_id,
            'name' => $this->name,
            'alphanumeric_name' => $this->alphanumeric_name,
            'instructions' => $this->instructions,
            'model' => $this->model,
            'tools' => $this->tools,
            'metadata' => $this->metadata,
            'api_key_id' => $this->api_key_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}