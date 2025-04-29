<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/category') . '/' . $image;
        }
        return "";
    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'category');
            $this->attributes['image'] = $imageFields;
        } else {
            $this->attributes['image'] = $image;
        }
    }

}
