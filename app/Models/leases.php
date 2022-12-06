<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class leases extends Model
{
    use HasFactory;
    protected $table = 'leases';
    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function propertyUnits()
    {

        return $this->hasMany(propertyunits::class, 'id');
    }
    public function tenants()
    {

        return $this->hasMany(tenants::class, 'id');
    }
    public function customer()
    {

        return $this->hasMany(customer::class, 'id');
    }
}