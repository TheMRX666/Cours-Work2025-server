<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'url' => $this->url,
            'is_main' => $this->is_main,
            'sort_order' => $this->sort_order,
        ];
    }
}
