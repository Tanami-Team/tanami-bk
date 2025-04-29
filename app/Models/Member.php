<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Member') . '/' . $image;
        }
        return "";
    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Member');
            $this->attributes['image'] = $imageFields;
        }
    }

}
