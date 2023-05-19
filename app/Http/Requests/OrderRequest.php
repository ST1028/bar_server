<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'menu_id'      => ['required', 'numeric', 'exists:menus,id'],
            'friend_ids'   => ['required', 'array'],
            'friend_ids.*' => ['required', 'exists:friends,id'],
            'blend_id'     => ['nullable', 'numeric', 'exists:blends,id']
        ];
    }
}
