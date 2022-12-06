<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertytype extends Model
{
    use HasFactory;
    protected $table = 'propertytype';
    protected $primaryKey = 'id';
    // protected $fillable = ['type','description'];
    protected $guarded =['id'];
}