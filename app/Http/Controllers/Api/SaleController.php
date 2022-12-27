<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Saletransaction;
use App\Models\Salepayment;
use App\Models\Salelease;
use App\Http\Requests\SalePaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //
    public function getLeaseSaleInstallments($id)
    {
        // dd($id);
        $bussniess_id = auth()->user()->bussniess_id;
        $installments = saletransaction::where('sale_lease_id', $id)
            ->where('bussniess_id', $bussniess_id)->get();
        return CommonResource::collection($installments);
    }
    public function getSaleInstallment($id)
    {
        $bussniess_id = auth()->user()->bussniess_id;
        $installment = saletransaction::with('salelease')->where('id', $id)
            ->where('bussniess_id', $bussniess_id)->get();
        return CommonResource::collection($installment);
    }
    public function storeLeaseSalePayment(SalePaymentRequest $request)
    {
        try {

            $bussniess_id = auth()->user()->bussniess_id;
            $sale_payment = new Salepayment;
            $sale_payment->sale_lease_id = $request->sale_lease_id;
            $sale_payment->sale_transactions_id = $request->sale_monthly_id;
            $sale_payment->due_date = $request->due_date;
            $sale_payment->payment = $request->payment;
            $sale_payment->current_date = $request->current_date;
            $sale_payment->bussniess_id = $bussniess_id;
            $sale_payment->save();


            $sale_transaction = saletransaction::where('monthly', $request->sale_monthly_id)->where('sale_lease_id', $request->sale_lease_id)
                ->update(['status' => '1']);

            $data = DB::table('salepayments')->where('sale_lease_id', $request->sale_lease_id)->select('salepayments.payment')->sum('salepayments.payment');

            $sale_remining_payment = salelease::where('id', $request->sale_lease_id)->update(["paid_payment" => $data]);

            DB::commit();
            return $this->returnSuccess("Sale payments");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }



    public function getLeaseSalePayment()
    {
        $bussniess_id = auth()->user()->bussniess_id;
        $data = Salepayment::where('bussniess_id', $bussniess_id)->paginate(10);
        return CommonResource::collection($data);
    }

    public function showLeaseSalePayment($id)
    {

        $bussniess_id = auth()->user()->bussniess_id;
        $data = Salepayment::where('id', $id)
            ->where('bussniess_id', $bussniess_id)->get();
        return CommonResource::collection($data);
    }
}
