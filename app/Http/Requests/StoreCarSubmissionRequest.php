<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarSubmissionRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'postcode' => 'required|string|max:20',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'registration_number' => 'nullable|string|max:20',
            'vehicle_type' => 'required|string|in:Scrap,Used',
            'v5_present' => 'nullable|boolean',
            'keys_present' => 'nullable|boolean',
            'condition' => 'nullable|string|in:Scrap,Non-runner,Damaged,MOT failed,Accident damaged,Unwanted',
            'driveable' => 'nullable|boolean',
            'message' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max per image
        ];
    }
}
