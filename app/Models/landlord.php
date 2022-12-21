<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landlord extends Model
{
    use HasFactory;
    protected $table = 'landlords';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    protected $appends = ['image_url'];

   
    public function getImageUrlAttribute()
    {
        if (!empty($this->image)) {
            $image_url = asset('/assets/img/' . rawurlencode($this->image));
        } else {
            $image_url = asset('assets/img/default.png');
        }
        return $image_url;
    }
}
