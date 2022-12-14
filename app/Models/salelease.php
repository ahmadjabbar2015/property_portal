<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salepayment;
use App\Models\saletransaction;

class salelease extends Model
{
    use HasFactory;
    protected $table = 'saleleases';
    protected $primaryKey = 'id';
    protected $guarded =['id'];


}
