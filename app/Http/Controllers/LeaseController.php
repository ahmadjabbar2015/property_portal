<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertyunits;
use App\Models\Tenants;
use App\Models\Leases;
use App\Models\Salelease;
use App\Models\Customer;
use App\Models\Saletransaction;
use App\Models\Renttransaction;
use App\Models\Propertydetail;
// use DB;
 use Illuminate\Support\Facades\DB;
use Datatables;
use DateTime;

class LeaseController extends Controller
{



    public function create()
    {
        if (!auth()->user()->hasPermission('Leases','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;

        $property = DB::table('propertydetails')
            ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
            ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->where('propertydetails.bussniess_id','=',$bussniess_id)
            ->select(
                'propertydetails.*',
                'property_location.search',
                'property_location.address',
                'property_location.city',
                'property_location.state',
                'property_location.post',
                'amenities.propertynote',
                'amenities.age',
                'amenities.room',
                'amenities.bedroom',
                'amenities.bathroom',
                'amenities.animities',
                'propertyimages.propertyimage',
                'propertytype.type as propertytype_name',
                'landlords.full_name as landlord_name'
            )
            ->get();
        $customer = DB::table('customers')
            ->join('leads', 'leads.id', '=', 'customers.leads_id')
            ->where('customers.bussniess_id',$bussniess_id)

            ->select('leads.client_name', 'customers.*')->get();

        $tenants =Tenants::where('bussniess_id',$bussniess_id)->get();
        return view('lease.create')->with('customer', $customer)->with('tenants', $tenants)->with('property', $property);
    }
    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Leases','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $leasesdata = DB::table('leases')
            ->join('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
            ->join('tenants', 'tenants.id', '=', 'leases.tenant_id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
            ->where('leases.bussniess_id',$bussniess_id)
            ->select('leases.*', 'tenants.full_name', 'propertyunits.title', 'propertydetails.name')
            ->get();
        // dd($leasesdata);
        if ($request->ajax()) {
            return Datatables::of($leasesdata)

                ->addIndexColumn()
                ->addColumn('paid', function ($row){
                    $totalpayment=$row->total_payment;
                    $amount_paid=$row->paid_payment;

                    $remaining_total_payment = $totalpayment - $amount_paid;

                    return $remaining_total_payment;

                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <a title="view" href="/lease/rent_show/'. $row->id . '" class="edit btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a title="installement" href="/lease/rent_intallment/' . $row->id . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-coins"></i></a>
                    <a title="payment" href="/lease/rent_payment/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-credit-card"></i></a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action' , "paid"])
                ->make(true);
        }
        return view('lease.index');
    }
    public function show($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $data =  DB::table('leases')
        ->join('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
        ->join('tenants', 'tenants.id', '=', 'leases.tenant_id')
        ->leftjoin('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
        ->where('leases.bussniess_id',$bussniess_id)
        ->select('leases.*',
        'tenants.full_name', 'propertydetails.name')
        ->where('leases.id', $id)->first();




        return view('lease.show')->with('data', $data);
    }

    public function store(Request $request)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $property_id=$request->property_id;
        $leasesdata = new Leases;
        $leasesdata->property_id = $request->property_id;

        $leasesdata->propertyunit_id = $request->propertyunit_id;
        $leasesdata->rent = $request->rent;
        $leasesdata->get_dmy = $request->get_dmy;
        $leasesdata->advance_payments = $request->advance_payments;
        $leasesdata->tenant_id = $request->tenant_id;
        $leasesdata->new_teanants_id = $request->new_teanants_id;
        $leasesdata->lease_start = $request->lease_start;
        $leasesdata->lease_end = $request->lease_end;
        $leasesdata->due_date = $request->due_date;
        $leasesdata->frequency_collection = $request->frequency_collection;
        $leasesdata->total_payment = $request->total_payment;
        $leasesdata->bussniess_id =$bussniess_id;
        $leasesdata->image = $request->image;

        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;
            $data = $file->move(public_path('/assets/img'), $filename);
            $leasesdata->image = $filename;
        }
        $leasesdata->terms = $request->terms;



        $leasesdata->save();

        // propertydetail::where('id',$property_id)->update(['property_status' => 1]);

        $this->rentintallment($leasesdata->id);
        $flas_message = toastr()->success('Leases Addedd Successfully');
        return redirect(route('lease.index'))->with('flas_message');
    }
    public function rentintallment($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $rentdata = Leases::where('id', $id)->where('bussniess_id',$bussniess_id)->first();

        $no_of_ym = $rentdata->get_dmy;
        $payment_my = $rentdata->rent;
        $frequncy = $rentdata->frequency_collection;
        $saleduedate = $rentdata->due_date;
        $leasestartdate = $rentdata->lease_start;
        if ($frequncy  == "monthly") {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i month");
                $saleleasetransaction = new renttransaction;
$saleleasetransaction->bussniess_id=$bussniess_id;
                $saleleasetransaction->rent_leases_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        } else if ($frequncy  == "annually") {
            for ($i = 1; $i < +$no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i Year");
                $saleleasetransaction = new renttransaction;
                $saleleasetransaction->bussniess_id=$bussniess_id;
                $saleleasetransaction->rent_leases_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        } else {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i Day");
                $saleleasetransaction = new renttransaction;
                $saleleasetransaction->bussniess_id=$bussniess_id;
                $saleleasetransaction->rent_leases_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        }
    }
    public function rentinstallmentplane($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $data = Renttransaction::where('rent_leases_id', $id)->where('bussniess_id',$bussniess_id)->get();
        return view("lease.rent_installment")->with('data', $data);
    }
    public function sale_store(Request $request)
    {

        $bussniess_id=auth()->user()->bussniess_id;
        $property_id=$request->property_id;
        $salelease = new Salelease;
        $salelease->bussniess_id=$bussniess_id;
        $salelease->property_id = $request->property_id;
        $salelease->propertyunit_id = $request->propertyunit_id;
        $salelease->total_sale_price = $request->total_sale_price;
        $salelease->sale_advance_payment = $request->sale_advance_payment;
        $salelease->customer_id = $request->customer_id;
        $salelease->remaing_payment = $request->remaing_payment;
        $salelease->lease_start = $request->lease_start;

        $salelease->due_date = $request->due_date;
        $salelease->frequency_collection = $request->frequency_collection;
        $salelease->number_of_years_month = $request->number_of_years_month;
        $salelease->payment_per_frequency = $request->payment_per_frequency;
        $salelease->image = $request->image;
        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;
            $data = $file->move(public_path('/assets/img'), $filename);
            $salelease->image = $filename;
        }
        $salelease->terms = $request->terms;

        $salelease->save();
        // propertydetail::where('id',$property_id)->update(['property_status' => 1]);
        $saleleseid = $salelease->id;
        $this->saleinstallmentplane($saleleseid);

        $flas_message = toastr()->success('Leases Addedd Successfully');
        return redirect(route('lease.saleindex'))->with('flas_message');
    }
    public function saleinstallmentplane($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $saledata = Salelease::where('id', $id)->where('bussniess_id',$bussniess_id)->first();
        $no_of_ym = $saledata->number_of_years_month;
        $payment_my = $saledata->payment_per_frequency;
        $frequncy = $saledata->frequency_collection;
        $saleduedate = $saledata->due_date;
        $leasestartdate = $saledata->lease_start;
        if ($frequncy  == "monthly") {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i month");
                $saleleasetransaction = new Saletransaction;
$saleleasetransaction->bussniess_id=$bussniess_id;
                $saleleasetransaction->sale_lease_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        } else {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i Year");
                $saleleasetransaction = new Saletransaction;
                $saleleasetransaction->bussniess_id=$bussniess_id;
                $saleleasetransaction->sale_lease_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        }
    }

    public function edit($id)
    {
        $property = DB::table('propertydetails')
            ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
            ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->select(
                'propertydetails.*',
                'property_location.search',
                'property_location.address',
                'property_location.city',
                'property_location.state',
                'property_location.post',
                'amenities.propertynote',
                'amenities.age',
                'amenities.room',
                'amenities.bedroom',
                'amenities.bathroom',
                'amenities.animities',
                'propertyimages.propertyimage',
                'propertytype.type as propertytype_name',
                'landlords.full_name as landlord_name'
            )
            ->get();

        $propertyunits = propertyunits::all();
        $tenants = tenants::all();

        $lease = DB::table('leases')
            ->leftjoin('tenants', 'tenants.id', '=', 'leases.tenant_id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
            ->select('leases.*', 'tenants.full_name', 'propertyunits.title', 'propertydetails.name as propertyname')
            ->where('leases.id', '=', $id)
            ->first();

        return view('lease.edit')->with('lease', $lease)->with('propertyunits', $propertyunits)->with('tenants', $tenants)->with('property', $property);
    }
    public function update(Request $request, $id)
    {
        $updatedata = $request->except('_token');


        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;

            $data = $file->move(public_path('/assets/img'), $filename);
            $updatedata['image'] = $filename;
        }


        $sql = leases::where('id', $id)->update($updatedata);
        $flas_message =  toastr()->success('propertyunits Updated Successfully');

        return redirect(route('lease.index'))->with('flas_message');
    }
    public function delete($id)
    {
        DB::table('leases')->delete($id);
        $flas_message =  toastr()->success('Landlord Deleted Successfully');
        return redirect(route('lease.index'))->with('flas_message');
    }
    public function get_property_unit(Request $request, $id)
    {

        $property_id = $id;

        $propertyunits = propertyunits::where('property_id', $property_id)->get();
        return $propertyunits;
    }
    public function saleindex(Request $request)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        if (!auth()->user()->hasPermission('Leases','view')){
            return redirect(route('404'));
        }

        $leasessaledata = DB::table('saleleases')
            ->join('propertydetails', 'propertydetails.id', '=', 'saleleases.property_id')
            ->join('customers', 'customers.id', '=', 'saleleases.customer_id')
            ->join('leads','customers.leads_id','=','leads.id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'saleleases.propertyunit_id')
            ->where('saleleases.bussniess_id',$bussniess_id)
            ->select('saleleases.*',  'propertyunits.title', 'propertydetails.name','leads.client_name As first_name')
            ->get();


        if ($request->ajax()) {


            return Datatables::of($leasessaledata)

                ->addIndexColumn()
                ->addColumn("remining_paid" , function($row){
                      $paid = $row->paid_payment;
                      $remining= $row->remaing_payment;

                      $totalRemining = $remining- $paid;

                      return $totalRemining;

                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <a title="view" href="/lease/sale_show/'. $row->id . '" class="edit btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a title="installement" href="/lease/installment/' . $row->id . '" class="edit btn btn-info btn-sm"><i class="fas fa-coins"></i></a>
                    <a title="payment" href="/lease/sale/payment/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa fa-credit-card"></i></a>

                   ';
                    return $actionBtn;
                })

                ->rawColumns(['action' , "remining_paid"])
                ->make(true);
        }
        return view('lease.saleindex');
    }
    public function installmentplane($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $data = Saletransaction::where('sale_lease_id', $id)->where('bussniess_id',$bussniess_id)->get();

        return view("lease.sale_installment")->with('data', $data);
    }
    public function saleshow($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $data =  DB::table('saleleases')
                ->join('propertydetails', 'propertydetails.id', '=', 'saleleases.property_id')
                ->join('customers', 'customers.id', '=', 'saleleases.customer_id')
                ->join('leads','customers.leads_id','=','leads.id')
                ->leftjoin('propertyunits', 'propertyunits.id', '=', 'saleleases.propertyunit_id')
                ->select('saleleases.*','customers.id', 'propertyunits.title', 'propertydetails.name','leads.client_name As first_name')
                ->where('saleleases.id'  , $id)->where('saleleases.bussniess_id',$bussniess_id)->first();

                return view("lease.sale_show",compact('data'));
    }

}
