<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadProductRequest extends FormRequest
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
            'product_category' => 'required|string|in:upvc_door,door,window',
            'width' => 'required|integer|min:1',
            'height' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'design' => 'required|string|in:sliding,casement,fixed,folding',
            'glass_specification' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'square_feet' => 'required|numeric|min:1',
            'position' => 'required|string|in:inside,outside,center',
            'date' => 'nullable|date',
        ];
    }
}
