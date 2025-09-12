<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccessoriesInventoryRequest extends FormRequest
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
            'item_id' => 'required|string|max:50|unique:accessories_inventories,item_id',
            'item_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'available_qty' => 'required|numeric|min:0',
            'reorder_level' => 'required|numeric|min:0',
            'category' => 'required|in:Consumable,Accessory',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
    public function messages(): array
    {
        return [
            'item_id.required' => 'Item ID is required.',
            'item_id.unique' => 'This Item ID already exists.',
            'item_name.required' => 'Item Name is required.',
            'unit.required' => 'Unit is required.',
            'available_qty.required' => 'Available Quantity is required.',
            'reorder_level.required' => 'Reorder Level is required.',
            'category.required' => 'Category is required.',
            'supplier_id.required' => 'Supplier selection is required.',
            'supplier_id.exists' => 'Selected supplier does not exist.',
        ];
    }
}
