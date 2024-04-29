<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAirportsRequest extends FormRequest
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
            'countries_id' => 'integer|exists:countries,id',
            'name' => 'string|max:255',
            'code' => 'string|max:3|min:3',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'countries_id.integer' => 'Country ID must be an integer',
            'countries_id.exists' => 'Country ID does not exist',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'code.string' => 'Code must be a string',
            'code.max' => 'Code must not exceed 3 characters',
            'code.min' => 'Code must be at least 3 characters',
            'latitude.numeric' => 'Latitude must be a number',
            'longitude.numeric' => 'Longitude must be a number',
        ];
    }
}
