<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
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
            'is_active' => ['nullable', 'boolean'],
            'priority' => ['nullable', 'numeric'],
            'image' => ['nullable', 'mimes:png,jpeg,jpg,svg'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_active' => (bool)$this->is_active]);
    }

}
