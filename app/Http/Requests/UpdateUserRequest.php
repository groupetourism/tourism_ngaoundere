<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'lastname' => 'string|max:100',
            'firstname' => 'string|max:100',
            'phone' => ['string', 'max:9', Rule::unique('users')->ignore($userId)],
            'email' => ['email', 'max:100', Rule::unique('users')->ignore($userId)],
        ];
    }
}
