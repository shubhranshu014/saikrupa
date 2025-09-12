<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallRequest extends FormRequest
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
            'lead_id' => 'required|exists:leads,id',
            'call_time' => 'required|date',
            'notes' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'lead_id.required' => 'Lead is required.',
            'lead_id.exists' => 'The selected lead does not exist.',
            'call_time.required' => 'Call time is required.',
            'notes.required' => 'Please enter notes for the call.',
        ];
    }
}
