<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GovernanceFile extends Model
{

    use HasTranslations , HasFactory;

    public $translatable = ['name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getFileAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Governance') . '/' . $image;
        }
        return "";
    }
    public function setFileAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Governance');
            $this->attributes['file'] = $imageFields;
        }else{
            $this->attributes['file'] = $image;
        }
    }
}
