<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
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
            "link" => [
                'review' => route('product.show',$this->id)
            ],
        ];
    }
}
