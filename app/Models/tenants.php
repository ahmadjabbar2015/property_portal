<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenants extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    // protected $fillable = ['full_name', 'email','number','identity','image','address','occupation','place'];
    protected $appends = ['image_url'];
    // protected $fillable = ['full_name', 'email','number','identity','image','address','occupation','account'];
   
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
