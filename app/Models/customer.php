<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $guarded =['id'];



    public function lead()
    {

        return $this->belongsTo(lead::class, 'leads_id');
    }
    public function propertydetail()
    {

        return $this->belongsTo(propertydetail::class, 'property_id');
    }
    public function agent()
    {

        return $this->belongsTo(agent::class, 'agent_id');
    }
   
}
