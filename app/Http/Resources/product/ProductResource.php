<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [

            'name' => $this->name,
            'description' => $this->detail,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'totalPrice'=>(1 - ($this->discount/100))*$this->price,
            'stock'=>$this->stock == 0 ? 'Out Of Stock' : $this->stock,
            'rating'=>$this->reviews->count() ? round(($this->reviews->sum('star'))/$this->reviews->count())
            : "No Rating Yet",

            'href'=> [
                'reviews'=> route('reviews.index',$this->id) 
            ]
        ];
    }
}
