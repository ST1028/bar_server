<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'menu_category_id' => ['required', 'integer', 'exists:menu_categories,id'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'recipe' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'is_remarks_required' => ['required', 'boolean']
        ];
    }
}