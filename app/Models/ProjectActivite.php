<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectActivite extends Model
{  use HasTranslations , HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $translatable = ['name'];

    protected $locale = 'ar';  // Default locale

    public function getLocale(): string
    {
        // Make sure to return a valid locale string, not null
        return app()->getLocale() ?? $this->locale;
    }

    public function getIconAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/ProjectActivite') . '/' . $image;
        }
        return "";
    }
    public function setIconeAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'ProjectActivite');
            $this->attributes['icon'] = $imageFields;
        }else{
            $this->attributes['icon'] = $image;
        }
    }

}
