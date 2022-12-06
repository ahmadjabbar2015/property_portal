<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\propertyunits;
use App\Models\tenants;
use App\Models\leases;
use App\Models\salelease;
use App\Models\customer;
use App\Models\saletransaction;
use App\Models\renttransaction;
use App\Models\propertydetail;
use DB;
use Datatables;
use DateTime;

class LeaseController extends Controller
{
    //saad


    public function create()
    {

        $property = DB::table('propertydetails')
            ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
            ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->where('propertydetails.property_status','=','0')
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

            ->select('leads.client_name', 'customers.*')->get();

        $tenants = tenants::all();
        return view('lease.create')->with('customer', $customer)->with('tenants', $tenants)->with('property', $property);
    }
    public function index(Request $request)
    {
        // $data = leases::with(['propertyUnits','tenants'])->latest()->get();

        $leasesdata = DB::table('leases')
            ->join('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
            ->join('tenants', 'tenants.id', '=', 'leases.tenant_id')
            ->join('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
            ->select('leases.*', 'tenants.full_name', 'propertyunits.title', 'propertydetails.name')
            ->get();

        if ($request->ajax()) {


            return Datatables::of($leasesdata)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/lease/rent_intallment/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/lease/rent_intallment/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/lease/rent_payment/' . $row->id . '" class="edit btn btn-success btn-sm">payment</a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('lease.index');
    }

    public function store(Request $request)
    {

        $property_id=$request->property_id;
        $leasesdata = new leases;
        $leasesdata->property_id = $request->property_id;
        // dd($request->property_id);
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

        propertydetail::where('id',$property_id)->update(['property_status' => 1]);
       
        $this->rentintallment($leasesdata->id);
        $flas_message = toastr()->success('Leases Addedd Successfully');
        return redirect(route('lease.index'))->with('flas_message');
    }
    public function rentintallment($id)
    {
        $rentdata = leases::where('id', $id)->first();
        // dd($rentdata);
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

                $saleleasetransaction->rent_leases_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        }
    }
    public function sale_store(Request $request)
    {

        // dd($request);
        $property_id=$request->property_id;
        $salelease = new salelease;
        $salelease->property_id = $request->property_id;
        $salelease->propertyunit_id = $request->propertyunit_id;
        $salelease->total_sale_price = $request->total_sale_price;
        $salelease->sale_advance_payment = $request->sale_advance_payment;
        $salelease->customer_id = $request->customer_id;
        $salelease->remaing_payment = $request->remaing_payment;
        $salelease->lease_start = $request->lease_start;
        $salelease->lease_end = $request->lease_end;
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
        propertydetail::where('id',$property_id)->update(['property_status' => 1]);
        $saleleseid = $salelease->id;
        $this->saleinstallmentplane($saleleseid);

        $flas_message = toastr()->success('Leases Addedd Successfully');
        return redirect(route('lease.saleindex'))->with('flas_message');
    }
    public function saleinstallmentplane($id)
    {
        $saledata = salelease::where('id', $id)->first();
        $no_of_ym = $saledata->number_of_years_month;
        $payment_my = $saledata->payment_per_frequency;
        $frequncy = $saledata->frequency_collection;
        $saleduedate = $saledata->due_date;
        $leasestartdate = $saledata->lease_start;
        if ($frequncy  == "monthly") {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i month");
                $saleleasetransaction = new saletransaction;

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
                $saleleasetransaction = new saletransaction;

                $saleleasetransaction->sale_lease_id = $id;
                $saleleasetransaction->due_date = $due_data;
                $saleleasetransaction->monthly = $i;
                $saleleasetransaction->payment = $payment_my;
                $saleleasetransaction->save();
            }
        }
    }
    public function show($id)
    {
        $saledata = salelease::with('propertyUnits', 'property')->where("id", $id)->get();



        return view('lease.show')->with('saledata', $saledata);
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

        // $data = leases::with(['propertyUnits','tenants'])->latest()->get();

        $leasessaledata = DB::table('saleleases')
            ->join('propertydetails', 'propertydetails.id', '=', 'saleleases.property_id')
            ->join('customers', 'customers.id', '=', 'saleleases.customer_id')
            ->join('leads','customers.leads_id','=','leads.id')
            ->join('propertyunits', 'propertyunits.id', '=', 'saleleases.propertyunit_id')
            ->select('saleleases.*', 'customers.id', 'propertyunits.title', 'propertydetails.name','leads.client_name As first_name')
            ->get();


// dd($leasessaledata);
        if ($request->ajax()) {


            return Datatables::of($leasessaledata)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/lease/installment/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/lease/installment/' . $row->id . '" class="edit btn btn-success btn-sm">View</a>
                    <a href="/lease/sale/payment/' . $row->id . '" class="edit btn btn-success btn-sm">payment</a>
                   
                   ';
                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('lease.saleindex');
    }
    public function installmentplane($id)
    {

        $data = saletransaction::where('sale_lease_id', $id)->get();

        return view("lease.sale_installment")->with('data', $data);
    }
    public function rentinstallmentplane($id)
    {
        $data = renttransaction::where('rent_leases_id', $id)->get();

        return view("lease.rent_installment")->with('data', $data);
    }
}
