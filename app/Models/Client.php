<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Client') . '/' . $image;
        }
        return "";
    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Client');
            $this->attributes['image'] = $imageFields;
        }
    }
}
