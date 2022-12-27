<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Customer;
use App\Models\Lead;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function getCustomer()
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $customer = Customer::with([ 'lead', 'propertydetail',
            'propertydetail.location' , 
            'propertydetail.amenities' , 
            'propertydetail.propertyImages',
            'agent'
            ])
            ->where('bussniess_id',$bussniess_id)
            ->paginate(10);
        return CommonResource::collection($customer);
    }
    public function showCustomer($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $customer = Customer::where('id', $id)
        ->where('bussniess_id',$bussniess_id) ->get();

        return  CommonResource::collection($customer);
    }
    public function storeCustomer(CustomerRequest $request)
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
            return $this->returnSuccess("Customer");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
