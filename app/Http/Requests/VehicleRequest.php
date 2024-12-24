<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
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
        $vehicleId = $this->route('accommodation');
        return [
            'type' => ['required', 'numeric', 'in:1,2,3'],
            'license_plate' => ['required', 'string', 'max:100', Rule::unique('vehicles')->ignore($vehicleId)],
            'provider_name' => 'required|string|max:100',
            'description' => 'string|max:255',
            'number_of_seats' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'is_available' => 'required|boolean',
            'image' => 'file|mimes:pdf,jpg,png',
            'contact_info' => 'string|max:100',
            'website' => 'string|max:100',
        ];
    }
}
