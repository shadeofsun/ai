<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message_id' => ['required', 'string'],
            'type' => ['required', 'in:user,assistant'],
            'assistant_id' => ['nullable', 'required_if:type,assistant', 'exists:assistants,id'],
            'content' => ['required', 'json'],
            'metadata' => ['nullable', 'json'],
        ];
    }
}