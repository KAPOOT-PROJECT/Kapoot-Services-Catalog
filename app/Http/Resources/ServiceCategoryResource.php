<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_category_id' => $this->parent_category_id,
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image,
            'is_emergency' => $this->is_emergency,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'meta_keywords' => $this->meta_keywords,
            'requires_vehicle' => $this->requires_vehicle,
            'estimated_duration' => $this->estimated_duration,
        ];
    }
}
