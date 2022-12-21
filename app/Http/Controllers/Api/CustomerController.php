<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function getCustomer()
    {
        $customer = Customer::with([
            'lead',
            'propertydetail',
            'propertydetail.location' , 
            'propertydetail.amenities' , 
            'propertydetail.propertyImages',
            'agent'
            ])->get();
        return CommonResource::collection($customer);
    }
    public function showCustomer($id)
    {
        $customer = Customer::where('id', $id)->get();

        return  CommonResource::collection($customer);
    }
    public function storeCustomer(CustomerRequest $request)
    {
        try {
            DB::beginTransaction();
            $customers = new Customer;
            $customers->leads_id = $request->leads_id;
            $customers->agent_id = $request->agent_id;
            $customers->property_id = $request->property_id;
            $customers->property_price = $request->property_price;
            $customers->description = $request->description;
            $customers->save();
            DB::commit();
            return $this->returnSuccess("Customer");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
