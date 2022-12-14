<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    public function propertydetail()
    {
        return $this->belongsTo(propertydetail::class, 'property_id', 'id');
    }
    public function location()
    {
        return $this->belongsTo(location::class, 'id', 'property_id');
    }

    public function amenities()
    {
        return   $this->belongsTo(amenitie::class, 'id', 'property_id');
    }

    public function propertyImages()
    {
        return $this->belongsTo(propertyimage::class, 'id', 'property_id');
    }
    public function propertyunits()
    {
        return $this->belongsTo(propertyunits::class, 'propertyunit_id', 'id');
    }
    protected $appends = ['image_url'];

    
    public function getImageUrlAttribute()
    {
        if (!empty($this->inventoryimage)) {
            $image_url = asset('/assets/img/' . rawurlencode($this->inventoryimage));
        } else {
            $image_url = asset('assets/img/default.png');
        }
        return $image_url;
    }
}
