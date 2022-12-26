<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function propertyType()
    {
        return $this->belongsTo(Propertytype::class, 'propertytype_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getAttempts()
    {
        return $this->hasMany(Attempt::class , 'lead_id' , 'id');
    }
}
