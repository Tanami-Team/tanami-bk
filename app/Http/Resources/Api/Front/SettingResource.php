<?php

namespace App\Http\Resources\Api\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'description'=>$this->description,
            'logo'=>$this->logo,
            'phone'=>$this->phone,
            'whatsapp'=>$this->whatsapp,
            'email'=>$this->email,
            'contact_description'=>$this->contact_description,
            'address'=>$this->address,
            'address_link'=>$this->address_link,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'telegram'=>$this->telegram,
            'youtube'=>$this->youtube,
            'instagram'=>$this->instagram,
            'twitter'=>$this->twitter,
            'short_description'=>$this->short_description,
            'about_file'=>$this->about_file,
            'home_video'=>$this->home_video,
        ];
    }
}
