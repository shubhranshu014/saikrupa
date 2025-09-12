<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockMovementRequest extends FormRequest
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
            'movement_id' => 'required|string|unique:stock_movements,movement_id',
            'item_id' => 'required|exists:products,id',
            'movement_type' => 'required|in:IN,OUT,ADJUSTMENT',
            'quantity' => 'required|numeric|min:0.01',
            'reference' => 'nullable|string|max:255',
            'date' => 'required|date',
            'store_id' => 'required|exists:stores,id',
        ];
    }
    public function messages(): array
    {
        return [
            'movement_id.required' => 'Movement ID is required.',
            'item_type.required' => 'Please select an Item Type.',
            'item_id.required' => 'Please select an Item.',
            'movement_type.required' => 'Please select a Movement Type.',
            'quantity.required' => 'Quantity is required.',
            'date.required' => 'Movement date is required.',
            'store_id.required' => 'Please select a Store.',
        ];
    }
}
