<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations , HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $translatable = ['name','description','slug'];

    protected $locale = 'ar';  // Default locale

    public function getLocale(): string
    {
        // Make sure to return a valid locale string, not null
        return app()->getLocale() ?? $this->locale;
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/About') . '/' . $image;
        }
        return "";
    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'About');
            $this->attributes['image'] = $imageFields;
        } else {
            $this->attributes['image'] = $image;
        }
    }
    public function getBackgroundAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/About') . '/' . $image;
        }
        return "";
    }
    public function setBackgroundAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'About');
            $this->attributes['background'] = $imageFields;
        }else{
            $this->attributes['background'] = $image;

        }
    }
}
