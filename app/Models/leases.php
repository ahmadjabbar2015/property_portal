<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Leases extends Model
{
    use HasFactory;
    protected $table = 'leases';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $appends = ['image_url'];

    public function propertyUnits()
    {

        return $this->hasMany(Propertyunits::class, 'id');
    }
    public function tenants()
    {

        return $this->hasMany(Tenants::class, 'id');
    }
    public function customer()
    {

        return $this->hasMany(Customer::class, 'id');
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