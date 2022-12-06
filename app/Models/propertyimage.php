<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyimage extends Model
{
    use HasFactory;
    protected $table = 'propertyimages';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
}
