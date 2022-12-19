<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use Illuminate\Http\Request;
use App\Models\propertytype;
use App\Models\propertydetail;
use App\Models\landlord;
use App\Models\customer;
use App\Models\propertyunits;
use App\Models\leases;
use App\Models\lead;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB as FacadesDB;
use DB;

class Porperty_reportsController extends Controller
{

    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Reports','view')){
            return redirect(route('404'));
        }


        if ($request->ajax()) {



            $data = Propertydetail::join('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
                ->join('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
                ->leftjoin('propertyunits', 'propertyunits.property_id', '=', 'propertydetails.id')
                ->join('customers', 'customers.property_id', '=', 'propertydetails.id')
                ->join('leads', 'customers.leads_id', '=', 'leads.id')
                ->select('propertydetails.*', 'propertydetails.rent', 'landlords.full_name', 'propertytype.type', 'propertyunits.title', 'customers.leads_id as client_name ', 'leads.client_name');

            if (!empty($request->input('start_date'))) {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $newDate = date("Y-m-d", strtotime($start_date));
                $newDate1 = date("Y-m-d", strtotime($end_date));
                $data->whereBetween(DB::raw('DATE(propertydetails.created_at)'), [$newDate, $newDate1]);
            }
            if (!empty($request->input('property_id'))) {
                $property_id = $request->property_id;
                $data->where('propertydetails.id', '=', $property_id);
            }
            if (!empty($request->input('landlord_id'))) {
                $landlord_id = $request->landlord_id;
                $data->where('landlords.id', '=', $landlord_id);
            }
            if (!empty($request->input('leads_id'))) {
                $leads_id = $request->leads_id;
                $data->where('customers.id', '=', $leads_id);
            }
            if (!empty($request->input('propertytype_id'))) {
                $propertytype_id = $request->propertytype_id;
                $data->where('propertytype.id', '=', $propertytype_id);
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/porperty_reports/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $propertytype = Propertytype::all();
        $landlord = Landlord::all();
        $customer = Customer::join('leads', 'customers.leads_id', '=', 'leads.id')
            ->select('customers.id', 'leads.client_name')->get();
        $propertydetail = Propertydetail::all();

        return view('porperty_reports.index')->with(compact('propertytype', 'landlord', 'propertydetail', 'customer'));
    }
    public function show($id)
    {
        $propertydetail = Propertydetail::join('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->join('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->join('customers', 'customers.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyunits', 'propertyunits.property_id', '=', 'propertydetails.id')
            ->join('leads', 'customers.leads_id', '=', 'leads.id')
            ->select('propertydetails.*', 'landlords.full_name', 'propertytype.type', 'customers.leads_id as client_name', 'leads.client_name','propertyunits.title')
            ->where('propertydetails.id','=',$id)
            ->first();
        // dd($propertydetail);

        return view("porperty_reports.show")->with(compact('propertydetail'));
    }
}
