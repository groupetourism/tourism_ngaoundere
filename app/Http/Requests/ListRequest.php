<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
        return [
            'search' => 'nullable|string|max:100',
            'type_accommodation' => 'nullable|numeric|in:1,2,3,4,5,6',
            'type_vehicle' => 'nullable|numeric|in:1,2,3',
            'status' => 'nullable|numeric|in:-1,0,1',
            'user' => 'nullable|numeric|exists:users,id',
            'site' => 'nullable|numeric|exists:sites,id',
            'hotel' => 'nullable|numeric|exists:accommodations,id',
            'department' => 'nullable|numeric|exists:departments,id',
            'available' => 'nullable|boolean',
        ];
    }
}
