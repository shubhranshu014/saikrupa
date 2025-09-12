<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGlassInventoryRequest extends FormRequest
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
            'glass_id' => 'required|string|unique:glass_inventories,glass_id',
            'glass_type' => 'required|string|in:Clear,Tinted,Laminated,DGU',
            'thickness_mm' => 'required|numeric|min:1',
            'width_mm' => 'required|integer|min:1',
            'height_mm' => 'required|integer|min:1',
            'available_sheets' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}
