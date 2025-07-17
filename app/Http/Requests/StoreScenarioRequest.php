<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScenarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'api_key_id' => ['required', 'exists:api_keys,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'assistant_1_id' => ['required', 'exists:assistants,id'],
            'assistant_2_id' => ['required', 'exists:assistants,id'],
            'assistant_3_id' => ['nullable', 'exists:assistants,id'],
            'metadata' => ['nullable', 'json'],
        ];
    }

    public function messages(): array
    {
        return [
            'assistant_1_id.required' => 'The first assistant is required',
            'assistant_2_id.required' => 'The second assistant is required',
        ];
    }
}