<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function propertyType()
    {
        return $this->belongsTo(propertytype::class, 'propertytype_id');
    }

    public function source()
    {
        return $this->belongsTo(source::class, 'source_id');
    }
    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
