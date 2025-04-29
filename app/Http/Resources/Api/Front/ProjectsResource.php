<?php

namespace App\Http\Resources\Api\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'short_description'=>$this->short_description,
            'long_description'=>$this->long_description,
            'price'=>$this->price,
            'available'=>$this->available,
            'image'=>$this->image,
            'background'=>$this->background,
            'category_id'=>$this->category_id,
            'category_name'=>$this->Category->name,
        ];
    }
}
