<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class leases extends Model
{
    use HasFactory;
    protected $table = 'leases';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    protected $appends = ['image_url'];

    public function propertyUnits()
    {

        return $this->hasMany(propertyunits::class, 'id');
    }
    public function tenants()
    {

        return $this->hasMany(tenants::class, 'id');
    }
    public function customer()
    {

        return $this->hasMany(customer::class, 'id');
    }
  

   
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