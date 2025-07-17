<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAssistantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'alphanumeric_name' => [
                'string',
                'alpha_num',
                Rule::unique('assistants')->ignore($this->assistant)
            ],
            'instructions' => ['string'],
            'model' => ['string'],
            'tools' => ['nullable', 'json'],
            'metadata' => ['nullable', 'json'],
        ];
    }
}