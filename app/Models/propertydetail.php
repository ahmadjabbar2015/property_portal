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
}

