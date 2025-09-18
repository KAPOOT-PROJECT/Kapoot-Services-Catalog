<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'price_type' => $this->price_type,
            'base_price' => $this->base_price,
            'minimum_charge' => $this->minimum_charge,
            'is_mobile_available' => $this->is_mobile_available,
            'mobile_surcharge' => $this->mobile_surcharge,
            'photos' => $this->photos,
            'videos' => $this->videos,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
