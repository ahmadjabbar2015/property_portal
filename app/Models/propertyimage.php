<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertyimage extends Model
{
    use HasFactory;
    protected $table = 'propertyimages';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    protected $appends = ['image_url'];


    public function getImageUrlAttribute()
    {
        if (!empty($this->propertyimage)) {
            $image_url = asset('/assets/img/' . rawurlencode($this->propertyimage));
        } else {
            $image_url = asset('assets/img/default.png');
        }
        return $image_url;
    }




    // public function getImagePathAttribute()
    // {
    //     if (!empty($this->image)) {
    //         $image_path = public_path('uploads') . '/' . config('constants.product_img_path') . '/' . $this->image;
    //     } else {
    //         $image_path = null;
    //     }
    //     return $image_path;
    // }

}
