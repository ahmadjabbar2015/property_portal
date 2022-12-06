<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyunits extends Model
{
    use HasFactory;
    protected $table = 'propertyunits';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    // protected $fillable = ['main', 'title','commission','rent','deposit','details','description','image'];
}

