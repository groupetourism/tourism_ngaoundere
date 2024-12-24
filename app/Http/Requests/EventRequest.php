<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'site_id' => 'required|numeric|exists:sites,id',
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
            'ticket_price' => 'numeric',
            'start_date' => 'required|date|after_or_equal:' . now(config('constants.TIME_ZONE'))->format('Y-m-d H:i:s'),
            'end_date' => 'required|date|after:start_date',
            'image' => 'file|mimes:pdf,jpg,png',
        ];
    }
}
