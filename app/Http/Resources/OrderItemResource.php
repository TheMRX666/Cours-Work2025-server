<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'size_name' => $this->size_name,
            'price_at_purchase' => $this->price_at_purchase,
            'quantity' => $this->quantity,
        ];
    }
}
