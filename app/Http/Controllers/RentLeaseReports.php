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
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB as FacadesDB;
use DB;

class RentLeaseReports extends Controller
{
    public function index(Request $request)
    {


        //  dd($data);
        if ($request->ajax()) {


// dd($end_date);
            $data = Propertydetail::join('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->join('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->join('propertyunits', 'propertyunits.property_id', '=', 'propertydetails.id')
            ->join('customers', 'customers.property_id', '=', 'propertydetails.id')
            ->join('leads', 'customers.leads_id', '=', 'leads.id')
            ->select('propertydetails.*', 'propertydetails.rent', 'landlords.full_name', 'propertytype.type', 'propertyunits.title', 'customers.leads_id as client_name ','leads.client_name')
            ;
            // $start_date = $request->get('start_date');
            // $end_date = $request->get('end_date');

            if(!empty($request->input('start_date'))){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $newDate = date("Y-m-d", strtotime($start_date));
                $newDate1 = date("Y-m-d", strtotime($end_date));
                $data->whereBetween(DB::raw('DATE(propertydetails.created_at)'), [$newDate,$newDate1]);
            }
            if(!empty($request->input('property_id'))){
                $property_id = $request->property_id;
                $data->where('propertydetails.id' , '=', $property_id );
            }
            if(!empty($request->input('landlord_id'))){
                $landlord_id = $request->landlord_id;
                $data->where('propertydetails.id' , '=', $landlord_id );
            }
            if(!empty($request->input('propertytype_id'))){
                $propertytype_id = $request->propertytype_id;
                $data->where('propertydetails.id' , '=', $propertytype_id );
            }
            if(!empty($request->input('leads_id'))){
                $leads_id = $request->leads_id;
                $data->where('propertydetails.id' , '=', $leads_id );
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

        $propertytype = Propertytype::all();
        $landlord = Landlord::all();
        $customer = Customer::with(['attempt'])->get();
        // dd($customer);
        $attempt = Attempt::all();
        $lead = Lead::all();
        $propertydetail = Propertydetail::all();

     return view('reports.rentreports')->with(compact('propertytype', 'landlord', 'propertydetail', 'customer', 'lead','attempt'));
    }
}
