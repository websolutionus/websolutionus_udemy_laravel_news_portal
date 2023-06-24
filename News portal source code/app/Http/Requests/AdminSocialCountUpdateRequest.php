<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSocialCountUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'icon' => ['required'],
            'fan_count' => ['required', 'max:255'],
            'fan_type' => ['required', 'max:255'],
            'button_text' => ['required', 'max:255'],
            'color' => ['required', 'max:255'],
            'url' => ['required'],
        ];
    }
}
