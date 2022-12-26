<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $table = 'attempts';
    protected $guarded =['id'];
    protected $primaryKey = 'id';

    public function propertyType()
    {
        return $this->belongsTo(Propertytype::class, 'propertytype_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }
}

