<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'accommodation_id' => 'required|numeric|exists:accommodations,id',
            'room_number' => 'required|string|max:100',
            'capacity' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'is_available' => 'required|boolean',
            'image' => 'file|mimes:pdf,jpg,png',

        ];
    }
}
