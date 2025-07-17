<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApiKeyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'api_key' => ['required', 'string', 'min:20'],
            'organization_id' => ['nullable', 'string'],
            'secret_key' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ];
    }
}