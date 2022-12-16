<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\renttransaction;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function getRentInstallments($id)
    {
        $installments = renttransaction::where('rent_leases_id' , $id)->get();
        return CommonResource::collection($installments);
    }

    public function getRentInstallment($id)
    {
        $installment = renttransaction::with('lease')->where('id' , $id)->get();
        return CommonResource::collection($installment);
    }
}
