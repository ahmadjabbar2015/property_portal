<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Leases extends Model
{
    use HasFactory;
    protected $table = 'leases';
    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function propertyUnits()
    {

        return $this->hasMany(Propertyunits::class, 'id');
    }
    public function tenants()
    {

        return $this->hasMany(Tenants::class, 'id');
    }
    public function customer()
    {

        return $this->hasMany(Customer::class, 'id');
    }
}
