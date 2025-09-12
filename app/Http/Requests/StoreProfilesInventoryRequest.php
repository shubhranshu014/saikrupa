<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilesInventoryRequest extends FormRequest
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
            'profile_id' => 'required|string|unique:profiles_inventories,profile_id',
            'profile_name' => 'required|string|max:255',
            'profile_type' => 'required|string|in:Frame,Sash,Mullion,Bead',
            'material' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'length_mm' => 'required|string',
            'available_bars' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }

    public function messages(): array
    {
        return [
            'profile_id.required' => 'The Profile ID is required.',
            'profile_id.unique' => 'This Profile ID already exists.',
            'profile_type.in' => 'Invalid profile type selected.',
        ];
    }
}
