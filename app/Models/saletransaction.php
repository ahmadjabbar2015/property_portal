<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saletransaction extends Model
{
    use HasFactory;
    protected $table = 'saletransactions';
    protected $primaryKey = 'id';
    protected $guarded =['id'];

    
    public function salelease(){
        return $this->belongsTo(salelease::class  ,'sale_lease_id');
    }
    
}
