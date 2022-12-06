<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landlordreports;
use Datatables;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class LandlordreportsController extends Controller
{
    //
    public function create(Request $request)
    {
     
        $where = " ";
        if (isset($request->date)) {
            $where.= "date(created_at)".$request->date;
        }
        $rents = 0;
        $depoists = 0;
        $total = 0;
        $data=DB::table('landlords')
        ->leftjoin('propertydetails','propertydetails.landlord_id','=','landlords.id')
        ->select('landlords.*','propertydetails.rent','deposit')
        ->get();
        foreach ($data as $key => $value) {
            $deposit= $value->deposit - $value->rent;
            $value->total= $deposit;
             $rents+= $value->rent;
             $depoists+= $value->deposit;
             $total+= $value->total;
        } 
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('landlordreports.create')->with(compact( 'data', 'depoists' ,'rents','total'));
    }
}
