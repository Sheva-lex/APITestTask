<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'is_active' => ['nullable', 'boolean'],
            'is_top' => ['nullable', 'boolean'],
            'priority' => ['nullable', 'numeric'],
            'price' => ['nullable', 'numeric'],
            'image' => ['nullable', 'mimes:png,jpeg,jpg,svg'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            [
                'is_active' => (bool)$this->is_active,
                'is_top' => (bool)$this->is_top
            ]
        );
    }
}
