<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\renttransaction;
use Illuminate\Http\Request;
use App\Http\Requests\RentPaymentRequest;
use App\Models\Rentpayment;
use App\Models\leases;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function getLeaseRentInstallments($id)
    {
        $installments = renttransaction::where('rent_leases_id' , $id)->get();
        return CommonResource::collection($installments);
    }

    public function getRentInstallment($id)
    {
        $installment = renttransaction::with('lease')->where('id' , $id)->get();
        return CommonResource::collection($installment);
    }
    public function storeLeaseRentPayment(RentPaymentRequest $request)
    {
        try {
            $sale_payment = new Rentpayment;
            $sale_payment->rent_lease_id = $request->rent_lease_id;
            $sale_payment->rent_transactions_id = $request->rent_monthly_id;
            $sale_payment->due_date = $request->due_date_rent;
            $sale_payment->payment = $request->rent_payment;
            $sale_payment->current_date = $request->rent_current_date;
            $sale_payment->save();

            $sale_transaction = renttransaction::where('monthly', $request->rent_monthly_id)->where('rent_leases_id', $request->rent_lease_id)
                ->update(['status' => '1']);

            $data = DB::table('rentpayments')->where('rent_lease_id', $request->rent_lease_id)->select('rentpayments.payment')->sum('rentpayments.payment');

            $rent_remining_payment = leases::where('id', $request->rent_lease_id)->update(["paid_payment" => $data]);
            $sale_payment->save();
            DB::commit();
            return $this->returnSuccess("rentpayments");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }

    public function getLeaseRentPayment()
    {
        $data = Rentpayment::get();
        return CommonResource::collection($data);
    }


    public function showLeaseRentPayment($id)
    {

        $data=Rentpayment::where('id',$id)->get();
        return CommonResource::collection($data);
    }
}
