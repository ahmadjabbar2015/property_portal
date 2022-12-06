<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $table = 'property_location';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    // protected $fillable = ['id','property_id','search','address','city','state','post'];
}

