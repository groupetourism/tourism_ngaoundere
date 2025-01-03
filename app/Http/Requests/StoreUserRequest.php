<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');
        return [
            'lastname' => 'required|string|max:100',
            'firstname' => 'string|max:100',
            'phone' => 'required|string|max:9|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:15|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
