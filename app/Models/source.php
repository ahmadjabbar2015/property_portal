<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;
    protected $table = 'sources';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    // protected $fillable = ['full_name', 'email','number','identity','image','address','occupation','place'];
}

