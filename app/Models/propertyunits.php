<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyunits extends Model
{
    use HasFactory;
    protected $table = 'propertyunits';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $fillable = ['main', 'title','commission','rent','deposit','details','description','image'];
    public function propertydetail()
    {
        return $this->belongsTo(propertydetail::class,  'id');
    }
    public function location()
    {
        return $this->belongsTo(location::class,  'property_id');
    }

    public function amenities()
    {
        return   $this->belongsTo(amenitie::class,  'property_id');
    }

    public function propertyImages()
    {
        return $this->belongsTo(propertyimage::class,  'property_id');
    }
    protected $appends = ['image_url'];


    public function getImageUrlAttribute()
    {
        if (!empty($this->propertyunitsfimage)) {
            $image_url = asset('/assets/img/' . rawurlencode($this->propertyunitsimage));
        } else {
            $image_url = asset('assets/img/default.png');
        }
        return $image_url;
    }
}
