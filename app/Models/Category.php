<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
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

    public function CategoryImages(){
        return $this->hasMany(CategoryImage::class);
    }
    public function Projects(){
        return $this->hasMany(Project::class);
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Category') . '/' . $image;
        }
        return "";
    }
    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Category');
            $this->attributes['image'] = $imageFields;
        }
    }
    public function getBackgroundAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Category') . '/' . $image;
        }
        return "";
    }
    public function setBackgroundAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Category');
            $this->attributes['background'] = $imageFields;
        }
    }
}
