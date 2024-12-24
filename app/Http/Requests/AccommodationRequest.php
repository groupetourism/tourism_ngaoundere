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
            'type' => ['required', 'numeric', 'in:1,2,3'],
            'name' => ['required', 'string', 'max:100', Rule::unique('accommodations')->ignore($accommodationId)],
            'description' => 'string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'file|mimes:pdf,jpg,png',
            'contact_info' => 'string|max:100',
            'website' => 'string|max:100',
        ];

        switch ($this->input('type')) {
            case 1:
                $rules = array_merge($rules, [
                    'parking' => 'boolean',
                ]);
                break;
            case 2:
                $rules = array_merge($rules, [
                    'price_per_day' => 'numeric',
                    'number_of_stars' => 'numeric',
                    'number_of_parlors' => 'numeric',
                    'number_of_rooms' => 'numeric',
                    'number_of_kitchens' => 'numeric',
                    'number_of_bathroom' => 'numeric',
                    'number_of_shower' => 'numeric',
                    'balcony' => 'boolean',
                    'parking' => 'boolean',
                ]);
                break;
            case 3:
                break;
        }
        return $rules;
    }
}
