<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertydetail extends Model
{
    use HasFactory;
    protected $table = 'propertydetails';
    protected $primaryKey = 'id';
    protected $guarded =['id'];


    public function location(){
        return $this->belongsTo(Location::class , 'id' , 'property_id');
    }

    public function amenities(){
        return   $this->belongsTo(Amenitie::class , 'id', 'property_id');
    }

    public function propertyImages(){
        return $this->belongsTo(Propertyimage::class , 'id', 'property_id' );
    }


}

