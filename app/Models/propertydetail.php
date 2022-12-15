<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertydetail extends Model
{
    use HasFactory;
    protected $table = 'propertydetails';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    // protected $fillable = ['name','rent','type','landlord','area','deposit','description'];

    public function location(){
        return $this->belongsTo(location::class , 'id' , 'property_id');
    }

    public function amenities(){
        return   $this->belongsTo(amenitie::class , 'id', 'property_id');
    }

    public function propertyImages(){
        return $this->belongsTo(propertyimage::class , 'id', 'property_id' );
    }

    
}

