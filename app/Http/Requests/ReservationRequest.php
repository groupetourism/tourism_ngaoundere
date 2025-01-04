<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reservable_type' => 'required|string|in:App\Models\Accommodation,App\Models\Vehicle,App\Models\Room', //if it is accommodation then id should for the one whose type is in [2]
            'reservable_id' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:' . now(config('constants.TIME_ZONE'))->format('Y-m-d H:i:s'),
            'end_date' => 'required|date|after:start_date',
//            'ticket_price' => 'numeric',
//            'status' => ['required', 'numeric', 'in:-1,0,1'],

        ];
    }
}
