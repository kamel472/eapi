<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'name'=>$this->name,
            'totalPrice'=>(1 - ($this->discount/100))*$this->price,
            'discount'=>$this->discount,
            'rating'=>$this->reviews->count() ? round(($this->reviews->sum('star'))/$this->reviews->count())
            : "No Rating Yet",

            'href'=> [
                'link'=> route('products.show',$this->id) 
            ]

        ];
    }
}
