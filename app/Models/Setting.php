<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{

    use HasTranslations , HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $translatable = ['title','description','contact_description','address','short_description'];

    protected $locale = 'ar';  // Default locale

    public function getLocale(): string
    {
        // Make sure to return a valid locale string, not null
        return app()->getLocale() ?? $this->locale;
    }
    public function getLogoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Setting') . '/' . $image;
        }
        return "";
    }
    public function setLogoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Setting');
            $this->attributes['logo'] = $imageFields;
        } else {
            $this->attributes['logo'] = $image;
        }
    }
}
