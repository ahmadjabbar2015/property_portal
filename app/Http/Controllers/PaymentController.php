<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salepayment;
use App\Models\saletransaction;
use App\Models\Rentpayment;
use App\Models\renttransaction;

class PaymentController extends Controller
{

    public function store(Request $request)
    {

        $sale_payment=new Salepayment;
        $sale_payment->sale_lease_id=$request->sale_lease_id;
        $sale_payment->sale_transactions_id=$request->sale_monthly_id;
        $sale_payment->due_date=$request->due_date;
        $sale_payment->payment=$request->payment;
        $sale_payment->current_date=$request->current_date;
        $sale_payment->save();

$sale_transaction=saletransaction::where('id',$request->sale_monthly_id)->where('sale_lease_id',$request->sale_lease_id)
->update(['status' => '1']);
        $flas_message=  toastr()->success('Data Successfully Saved');

        return redirect()->back()->with('flas_message');
    }
    public function salepayment($id)
    {

        $data=Salepayment::where('sale_lease_id',$id)->get();
        return view("payment.sale_payment")->with('data',$data);
    }
    public function rent_payment(Request $request)
    {

        $sale_payment=new Rentpayment;
        $sale_payment->rent_lease_id=$request->rent_lease_id;
        $sale_payment->rent_transactions_id=$request->rent_monthly_id;
        $sale_payment->due_date=$request->due_date_rent;
        $sale_payment->payment=$request->rent_payment;
        $sale_payment->current_date=$request->rent_current_date;
        $sale_payment->save();

$sale_transaction=renttransaction::where('id',$request->rent_monthly_id)->where('rent_leases_id',$request->rent_lease_id)
->update(['status' => '1']);
        $flas_message=  toastr()->success('Data Successfully Saved');

        return redirect()->back()->with('flas_message');
    }
    public function rentshowpayment($id)
    {

        $data=Rentpayment::where('rent_lease_id',$id)->get();
        return view("payment.rent_payment")->with('data',$data);
    }

}
