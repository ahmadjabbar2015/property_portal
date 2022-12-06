<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class amenitie extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table = 'amenities';
    protected $primaryKey = 'id';
    // protected $fillable = ['id','property_id','propertynote','age','room','bedroom','bathroom','animities'];
}
