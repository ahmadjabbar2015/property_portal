<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landlord extends Model
{
    use HasFactory;
    protected $table = 'landlords';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
    // protected $fillable = ['full_name', 'email','number','identity','image','address','occupation','account'];

}
