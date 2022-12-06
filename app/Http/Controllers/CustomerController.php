<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\lead;
use App\Models\attempt;
use App\Models\propertydetail;
use App\Models\agent;
use Datatables;
use DB;

class CustomerController extends Controller
{
    //Saad
    public function create($id)
    {

        $agents = agent::all();
        $leads = attempt::where('id', $id)->first();
        $propertydetails = propertydetail::all();
        $customers = customer::all();
        // dd($customers);
        return view('customer.create')->with('propertydetails', $propertydetails)->with('agents', $agents)->with('leads', $leads)->with('customers', $customers);
    }
    public function index()
    {
       
        $customer = customer::with(['propertydetail', 'agent','lead' => function($query) {   
            $query->where('customer_status', 1);
         }])->get();
    //   dd($customer);
        if (request()->ajax()) {
           
          
            return Datatables::of($customer)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="#" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/customer/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->addcolumn('date',function ($row){
                    $data=explode(" ",$row->created_at);
                    $date=$data[0];
                    return $date;

                })
                ->rawColumns(['action','date'])
                ->make(true);
        }

        return view('customer.index')->with(compact('customer'));
    }
    public function store(Request $request)
    {
        
        lead::where('id', $request->leads_id)->update(['customer_status' => 1]);
        $customers = new customer;
        $customers->leads_id = $request->leads_id;
        $customers->agent_id = $request->agent_id;
        $customers->property_id = $request->property_id;
        $customers->property_price = $request->property_price;
        $customers->description = $request->description;
        
        $customers->save();
        // dd($customers);
        $flas_message =  toastr()->success('Customer Addedd Successfully');
        return redirect(url('customers/index'));
    }
    public function show($id)
    {
        //  dd("jkjk");
        $customer = customer::find($id);
        $data = DB::table('customers')


            ->leftjoin('agents', 'agents.id', '=', 'customers.property_id')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'customers.property_id')
            // ->leftjoin('propertyunits','propertyunits.id','=','inventories.propertyunit_id')
            ->select('customers.*', 'agents.name', 'propertydetails.name as property_name')
            ->where('customers.id', '=', $id)
            ->first();
        // dd($data);
        return view('customer.show')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        try {

            $input = $request->except('_token');


            $sql = customer::where('id', $id)->update($input);
            $flas_message =  toastr()->success('customer Updated Successfully');

            return redirect(route('customer.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('customer.index'))->with('flas_message');
        }
    }
    public function edit($id)
    {
        $agents = agent::all();
        $propertydetails = propertydetail::all();
        $customer = DB::table('customers')



            ->leftjoin('agents', 'agents.id', '=', 'customers.agent_name')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'customers.property_id')
            ->select('customers.*', 'agents.name', 'propertydetails.name as property_name')
            ->where('customers.id', '=', $id)
            ->first();


        //   dd($customer);

        return view('customer.edit')->with('propertydetails', $propertydetails)->with('agents', $agents)->with('customer', $customer);
    }
    public function delete($id)
    {
        try {
            DB::table('customers')->delete($id);
            $flas_message =  toastr()->success('customer Deleted Successfully');

            return redirect(route('customers.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('customers.index'))->with('flas_message');
        }
    }
}
