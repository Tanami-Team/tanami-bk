<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectFile extends Model
{
    use HasTranslations , HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $translatable = ['name'];

    protected $locale = 'ar';  // Default locale

    public function getLocale(): string
    {
        // Make sure to return a valid locale string, not null
        return app()->getLocale() ?? $this->locale;
    }

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/ProjectFile') . '/' . $image;
        }
        return "";
    }
    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'ProjectFile');
            $this->attributes['File'] = $imageFields;
        }else{
            $this->attributes['File'] = $image;
        }
    }
}
