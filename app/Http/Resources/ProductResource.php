<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "Name" => $this->name,
            "Description" => $this->detail,
            "Price" => $this->price,
            "Stock" => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            "Discount" => $this->discount,
            'Total Price' => round((1 - ($this->discount/100)) * ($this->price),2),
            "Rating" => $this->review->sum('star'),
            "link" => [
                'review' => route('review.index',$this->id),
            ]
        ];
    }
}
