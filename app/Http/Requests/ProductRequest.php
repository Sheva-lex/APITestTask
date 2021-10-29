<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'is_active' => (bool)$this->is_active,
                'is_top' => (bool)$this->is_top
            ]
        );
    }

}
