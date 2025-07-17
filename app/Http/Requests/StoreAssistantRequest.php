<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssistantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'api_key_id' => ['required', 'exists:api_keys,id'],
            'assistant_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'alphanumeric_name' => ['required', 'string', 'alpha_num', 'unique:assistants'],
            'instructions' => ['required', 'string'],
            'model' => ['required', 'string'],
            'tools' => ['nullable', 'json'],
            'metadata' => ['nullable', 'json'],
        ];
    }
}