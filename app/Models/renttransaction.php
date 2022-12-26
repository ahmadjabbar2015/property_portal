<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renttransaction extends Model
{
    use HasFactory;
    protected $table = 'renttransactions';
    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function lease(){
        return $this->belongsTo(Leases::class , 'rent_leases_id');
    }
}
