<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landlordreports extends Model
{
    use HasFactory;
    protected $table = 'landlords';
    protected $primaryKey = 'id';
    protected $guarded =['id'];


}
