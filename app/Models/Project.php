<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations , HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $translatable = ['name','short_description','long_description','slug'];

    protected $locale = 'ar';  // Default locale

    public function getLocale(): string
    {
        // Make sure to return a valid locale string, not null
        return app()->getLocale() ?? $this->locale;
    }

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
    public function getBackgroundAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Client') . '/' . $image;
        }
        return "";
    }
    public function setBackgroundAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Client');
            $this->attributes['background'] = $imageFields;
        }
    }
    public function Category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
