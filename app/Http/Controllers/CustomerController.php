<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Attempt;
use App\Models\Propertydetail;
use App\Models\Agent;
use Datatables;
use DB;

class CustomerController extends Controller
{

    public function create($id)
    {
        if (!auth()->user()->hasPermission('Customer', 'create')) {
            return redirect(route('404'));
        }
        $bussniess_id = auth()->user()->bussniess_id;
        $agents = Agent::where('bussniess_id', $bussniess_id)->get();
        $leads = Attempt::where('id', $id)->first();
        $propertydetails = Propertydetail::where('bussniess_id', $bussniess_id)->get();
        // $customers = customer::where('bussniess_id',$bussniess_id);
        // dd($customers);
        return view('customer.create')->with('propertydetails', $propertydetails)->with('agents', $agents)->with('leads', $leads);
    }
    public function index()
    {
        if (!auth()->user()->hasPermission('Customer', 'view')) {
            return redirect(route('404'));
        }
        $bussniess_id = auth()->user()->bussniess_id;
        $customer = Customer::where('bussniess_id', $bussniess_id)->with(['propertydetail', 'agent', 'lead' => function ($query) {
            $query->where('customer_status', 1);
        }])->get();

        if (request()->ajax()) {


            return Datatables::of($customer)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/customer/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="#" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/customer/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->addcolumn('date', function ($row) {
                    $data = explode(" ", $row->created_at);
                    $date = $data[0];
                    return $date;
                })
                ->rawColumns(['action', 'date'])
                ->make(true);
        }

        return view('customer.index')->with(compact('customer'));
    }
    public function store(Request $request)
    {
        $bussniess_id = auth()->user()->bussniess_id;
        Lead::where('id', $request->leads_id)->where('bussniess_id', $bussniess_id)->update(['customer_status' => 1]);
        $customers = new Customer;
        $customers->leads_id = $request->leads_id;
        $customers->agent_id = $request->agent_id;
        $customers->property_id = $request->property_id;
        $customers->property_price = $request->property_price;
        $customers->description = $request->description;
        $customers->bussniess_id = $bussniess_id;

        $customers->save();
        // dd($customers);
        $flas_message =  toastr()->success('Customer Addedd Successfully');
        return redirect(url('customers/index'));
    }
    public function show($id)
    {
        $bussniess_id = auth()->user()->bussniess_id;
        $data = DB::table('customers')


            ->leftjoin('agents', 'agents.id', '=', 'customers.agent_id')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'customers.property_id')
            ->join('leads', 'leads.id', '=', 'customers.leads_id')
            ->join('sources', 'sources.id', '=', 'leads.source_id')
            ->join('propertytype', 'propertytype.id', '=', 'leads.propertytype_id')
            ->join('users', 'users.id', '=', 'leads.user_id')
            ->join('attempts', 'attempts.id', '=', 'leads.id')
            ->where('customers.bussniess_id', $bussniess_id)
            ->select(
                'customers.description',
                'customers.created_at As customer_create_date',
                'agents.name as agent_name',
                'leads.*',
                'propertydetails.name as property_name',
                'propertytype.type',
                'sources.source',
                'users.first_name As leads_creater',
                'attempts.budget_maximum',
                'attempts.updated_at as last_follow_date',
                'attempts.aad_remark as attempt_remark'
            )
            ->where('customers.id', '=', $id)
            ->first();

        return view('customer.show', compact('data'));
    }
    public function update($id, Request $request)
    {
        try {

            $input = $request->except('_token');


            $sql = Customer::where('id', $id)->update($input);
            $flas_message =  toastr()->success('customer Updated Successfully');

            return redirect(route('customer.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('customer.index'))->with('flas_message');
        }
    }
    public function edit($id)
    {
        $agents = Agent::all();
        $propertydetails = Propertydetail::all();
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
