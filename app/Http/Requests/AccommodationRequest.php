<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccommodationRequest extends FormRequest
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
        $accommodationId = $this->route('accommodation');
        $rules = [
            'department_id' => 'required|numeric|exists:departments,id',
            'type' => ['required', 'numeric', 'in:1,2,3,4,5,6'],
            'name' => ['required', 'string', 'max:100'],
            'description' => 'string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'file|mimes:pdf,jpg,png',
            'contact_info' => 'string|max:100',
            'website' => 'string|max:100',
        ];

        switch ($this->input('type')) {
            case config('constants.HOTEL'):
                $rules = array_merge($rules, [
                    'promoter' => 'required|string|max:100',
                    'number_of_stars' => 'numeric',
                    'parking' => 'boolean',
                    'number_of_rooms' => 'numeric',
                    'number_of_beds' => 'numeric',
                    'restaurant_capacity' => 'numeric',
                    'bar_capacity' => 'numeric',
                    'conference_room_capacity' => 'numeric',
                ]);
                break;
            case config('constants.RESTAURANT'):
                $rules = array_merge($rules, [
                    'promoter' => 'required|string|max:100',
                    'restaurant_capacity' => 'numeric',
                    'bar_capacity' => 'numeric',
                ]);
                break;
            case config('constants.LEISURE'):
                $rules = array_merge($rules, [
                    'promoter' => 'required|string|max:100',
                    'capacity' => 'numeric',
                ]);
                break;
            case config('constants.HOSPITAL'):
                $rules = array_merge($rules, [
                    'is_public' => 'required|boolean',
                ]);
                break;
            case config('constants.TRAVEL_AGENCIES'):
                break;
            case config('constants.HOSTEL'):
                $rules = array_merge($rules, [
                    'promoter' => 'required|string|max:100',
                    'number_of_stars' => 'numeric',
                    'parking' => 'boolean',
                    'number_of_rooms' => 'numeric',
                    'number_of_beds' => 'numeric',
                    'restaurant_capacity' => 'numeric',
                    'bar_capacity' => 'numeric',
                ]);
                break;
        }
        return $rules;
    }
}
