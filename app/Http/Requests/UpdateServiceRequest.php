<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'provider_id' => 'nullable|uuid',
            'category_id' => 'nullable|uuid',
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price_type' => 'sometimes|in:fixed,hourly,quote_based',
            'base_price' => 'sometimes|numeric|min:0',
            'minimum_charge' => 'nullable|numeric|min:0',
            'is_mobile_available' => 'sometimes|boolean',
            'mobile_surcharge' => 'nullable|numeric|min:0',
            'photos' => 'nullable|array',
            'photos.*' => 'string',
            'videos' => 'nullable|array',
            'videos.*' => 'string',
            'is_active' => 'sometimes|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ];
    }
}
