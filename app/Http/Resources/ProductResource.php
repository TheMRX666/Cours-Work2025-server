<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'is_active' => $this->is_active,
            'category' => $this->whenLoaded('category'),
            'brand' => $this->whenLoaded('brand'),
            'sizes' => $this->whenLoaded('sizes'),
            'images' => $this->whenLoaded('images'),
            'features' => $this->features,
        ];
    }
}
