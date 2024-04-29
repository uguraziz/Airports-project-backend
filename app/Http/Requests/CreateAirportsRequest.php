<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAirportsRequest extends FormRequest
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
            'countries_id' => 'required|integer|exists:countries,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3|min:3',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'countries_id.required' => 'Country ID is required',
            'countries_id.integer' => 'Country ID must be an integer',
            'countries_id.exists' => 'Country ID does not exist',
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'code.required' => 'Code is required',
            'code.string' => 'Code must be a string',
            'code.max' => 'Code must not exceed 3 characters',
            'code.min' => 'Code must be at least 3 characters',
            'latitude.required' => 'Latitude is required',
            'latitude.numeric' => 'Latitude must be a number',
            'longitude.required' => 'Longitude is required',
            'longitude.numeric' => 'Longitude must be a number',
        ];
    }
}
