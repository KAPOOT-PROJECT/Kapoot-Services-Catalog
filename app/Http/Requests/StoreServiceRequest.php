<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'id' => 'nullable|uuid',
            'provider_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_type' => 'required|in:fixed,hourly,quote_based',
            'base_price' => 'required|numeric|min:0',
            'minimum_charge' => 'nullable|numeric|min:0',
            'is_mobile_available' => 'required|boolean',
            'mobile_surcharge' => 'nullable|numeric|min:0',
            'photos' => 'nullable|array',
            'videos' => 'nullable|array',
            'is_active' => 'nullable|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ];
    }
}
