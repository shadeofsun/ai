<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApiKeyRequest extends FormRequest
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
        ];
    }
}