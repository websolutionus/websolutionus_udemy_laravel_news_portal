<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminProfileUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:admins,email,'.Auth::guard('admin')->user()->id]
        ];
    }
}
