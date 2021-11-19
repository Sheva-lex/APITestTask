<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:191'],
            'sortDirection' => ['nullable', 'string', 'in:asc,desc'],
            'sortField' => ['nullable', 'string', 'max:191'],
            'page' => ['nullable', 'int'],
            'perPage' => ['nullable', 'int'],
            'categoryId' => ['nullable', 'int', 'exists:categories,id'],
        ];
    }
}
