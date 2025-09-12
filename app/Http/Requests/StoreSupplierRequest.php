<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupplierRequest extends FormRequest
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
        $supplierId = $this->route('supplier')?->id;
        return [
           'supplier_id' => [
                'required',
                'string',
                Rule::unique('suppliers', 'supplier_id')->ignore($supplierId),
            ],
            'supplier_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:500',
            'gst_number' => 'required|string|max:50',
            'supply_type' => 'required|string|max:100',
            'bank_account_no' => 'nullable|string|max:30',
            'ifsc_code' => 'nullable|string|max:15',
            'notes' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive,Blacklisted',
        ];
    }
}
