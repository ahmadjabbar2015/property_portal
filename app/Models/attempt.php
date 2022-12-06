<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attempt extends Model
{
    use HasFactory;

    protected $table = 'attempts';
    protected $guarded =['id'];
    protected $primaryKey = 'id';
    
    public function propertyType()
    {
        return $this->belongsTo(propertytype::class, 'propertytype_id');
    }

    public function source()
    {
        return $this->belongsTo(source::class, 'source_id');
    }
}

