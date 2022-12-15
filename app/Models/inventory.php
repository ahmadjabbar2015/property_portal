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
    protected $appends = ['image_url'];
    // protected $fillable = ['main', 'title','commission','rent','deposit','details','description','image'];

    public function propertyUnits()
    {
        return $this->belongsTo(propertyunits::class,  'propertyunit_id');
    }

    public function propertyDetails()
    {
        return $this->belongsTo(propertydetail::class,  'property_id');
    }

    public function getImageUrlAttribute()
    {
        if (!empty($this->inventoryimage)) {
            $image_url = asset('/assets/img/' . rawurlencode($this->inventoryimage));
        } else {
            $image_url = asset('assets/default.png');
        }
        return $image_url;
    }
}
