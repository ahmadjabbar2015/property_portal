<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attempt;
use App\Models\Propertytype;
use App\Models\Propertydetail;
use App\Models\Landlord;
use App\Models\Customer;
use App\Models\Leases;
use App\Models\Lead;
use App\Models\tenants;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB as FacadesDB;
use DB;

class RentLeaseReports extends Controller
{





    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('leases')
            ->join('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
            ->join('tenants', 'tenants.id', '=', 'leases.tenant_id')
            ->join('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
            ->select('leases.id','leases.rent', 'leases.frequency_collection','leases.lease_start',
            'leases.lease_end','leases.due_date','leases.advance_payments','leases.total_payment',
            'tenants.full_name', 'propertydetails.name');

            if(!empty($request->input('start_date'))){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $newDate = date("Y-m-d", strtotime($start_date));
                $newDate1 = date("Y-m-d", strtotime($end_date));
                $data->whereBetween(DB::raw('DATE(leases.created_at)'), [$newDate,$newDate1]);
            }
            if(!empty($request->input('property_id'))){
                $property_id = $request->property_id;
                $data->where('propertydetails.id' ,'=', $property_id );
            }

            if(!empty($request->input('tenants_id'))){
                $tenants_id = $request->tenants_id;
                $data->where('tenants.id' , '=', $tenants_id );
            }

            if(!empty($request->input('installments_id'))){
                $installments_id = $request->installments_id;
                $data->where('leases.frequency_collection','=',$installments_id);
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $ts = tenants::all();
        $leases = Leases::get();
        $propertydetail = Propertydetail::all();

     return view('reports.rentreports')->with(compact('ts', 'propertydetail', 'leases'));
    }


    public function saleLeasesReports(Request $request)
    {
        if ($request->ajax()) {

            $leasessaledata = DB::table('saleleases')
            ->join('propertydetails', 'propertydetails.id', '=', 'saleleases.property_id')
            ->join('customers', 'customers.id', '=', 'saleleases.customer_id')
            ->join('leads','customers.leads_id','=','leads.id')
            ->join('propertyunits', 'propertyunits.id', '=', 'saleleases.propertyunit_id')
            ->select('saleleases.total_sale_price', 'saleleases.remaing_payment','saleleases.frequency_collection','saleleases.number_of_years_month','saleleases.payment_per_frequency','saleleases.due_date', 'customers.id', 'propertyunits.title', 'propertydetails.name','leads.client_name As first_name');


            if(!empty($request->input('start_date'))){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $newDate = date("Y-m-d", strtotime($start_date));
                $newDate1 = date("Y-m-d", strtotime($end_date));
                $leasessaledata ->whereBetween(DB::raw('DATE(saleleases.created_at)'), [$newDate,$newDate1]);
            }
            if(!empty($request->input('property_id'))){
                $property_id = $request->property_id;
                $leasessaledata ->where('propertydetails.id' ,'=', $property_id );
            }

            if(!empty($request->input('customer_id'))){
                $customer_id = $request->customer_id;
                $leasessaledata ->where('leads.id' , '=', $customer_id );
            }

            if(!empty($request->input('installments_id'))){
                $installments_id = $request->installments_id;
                $leasessaledata ->where('saleleases.frequency_collection','=',$installments_id);
            }


            return Datatables::of($leasessaledata)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/lease/installment/' . $row->id . '" class="edit btn btn-success btn-sm">View</a> ';
                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        $ts = tenants::all();
        $leases = Leases::get();
        $propertydetail = Propertydetail::all();
        $customer =  DB::table('customers')
        ->join('leads','customers.leads_id','=','leads.id')
        ->select('customers.id','leads.client_name')->get();
        return view('reports.salereports')->with(compact('ts', 'propertydetail', 'leases','customer'));
    }
}
