<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salepayment extends Model
{
    use HasFactory;

    protected $table = 'salepayments';
    protected $primaryKey = 'id';
    protected $guarded =['id'];
}
