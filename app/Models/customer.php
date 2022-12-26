<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $guarded =['id'];



    public function lead()
    {

        return $this->belongsTo(Lead::class, 'leads_id');
    }
    public function propertydetail()
    {

        return $this->belongsTo(Propertydetail::class, 'property_id');
    }
    public function agent()
    {

        return $this->belongsTo(Agent::class, 'agent_id');
    }

}
