<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteRequest extends FormRequest
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
        $siteId = $this->route('accommodation');
        return [
            'department_id' => 'required|numeric|exists:departments,id',
            'name' => ['required', 'string', 'max:100', Rule::unique('sites')->ignore($siteId)],
            'description' => 'string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'visite_periode' => 'required|string',
            'access_means' => 'required|string',
            'offered_service' => 'string',
            'cultural_info' => 'string',
//            'opening_hours' => 'required',
            'ticket_price' => 'numeric',
            'image' => 'file|mimes:pdf,jpg,png',
            'contact_info' => 'string|max:100',
            'website' => 'string|max:100',
        ];
    }
}
