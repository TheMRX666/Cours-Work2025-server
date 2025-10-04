<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        $url = $this->path ? url(Storage::url($this->path)) : null;

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'url' => $url,
            'is_main' => (bool) $this->is_main,
            'sort_order' => (int) $this->sort_order,
        ];
    }
}
