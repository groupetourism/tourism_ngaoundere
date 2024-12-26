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
            'type' => 'nullable|numeric|in:1,2,3',
            'site' => 'nullable|numeric|exists:sites,id',
            'hotel' => 'nullable|numeric|exists:accommodations,id',
            'available' => 'nullable|boolean',
        ];
    }
}
