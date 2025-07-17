<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThreadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'thread_id' => ['required', 'string'],
            'assistant_id' => ['required', 'exists:assistants,id'],
            'scenario_id' => ['required', 'exists:scenarios,id'],
            'metadata' => ['nullable', 'json'],
        ];
    }
}