<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScenarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'description' => ['nullable', 'string'],
            'assistant_1_id' => ['exists:assistants,id'],
            'assistant_2_id' => ['exists:assistants,id'],
            'assistant_3_id' => ['nullable', 'exists:assistants,id'],
            'metadata' => ['nullable', 'json'],
        ];
    }
}