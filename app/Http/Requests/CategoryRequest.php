<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'is_active' => ['nullable', 'boolean'],
            'priority' => ['nullable', 'numeric'],
            'image' => ['nullable', 'mimes:png,jpeg,jpg,svg'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['is_active' => (bool)$this->is_active]);
    }

}
