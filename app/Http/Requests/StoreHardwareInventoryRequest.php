<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHardwareInventoryRequest extends FormRequest
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
            'hardware_id' => 'required|string|max:255|unique:hardware_inventories,hardware_id',
            'hardware_name' => 'required|string|max:255',
            'application' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'available_qty' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}
