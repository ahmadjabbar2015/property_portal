<?php

namespace App\Utils;

use App\Models\Propertydetail;
use App\Models\leases;
use App\Models\renttransaction;
use App\Models\saletransaction;
use App\Models\salelease;
use Illuminate\Support\Facades\DB;
use Exception;
use DateTime;


class LeaseUtil extends Util
{
    public function getLeases($id = null)
    {
        $leases_data = leases::join('propertydetails', 'propertydetails.id', '=', 'leases.property_id')
            ->join('tenants', 'tenants.id', '=', 'leases.tenant_id')
            ->join('propertyunits', 'propertyunits.id', '=', 'leases.propertyunit_id')
            ->select('leases.*', 'tenants.full_name', 'propertyunits.title', 'propertydetails.name', DB::raw('(leases.total_payment-leases.paid_payment) as remaining_amount'));
        if ($id != null) {
            $leases_data = $leases_data->where('leases.id', $id)->paginate(10);
        }else{
            $leases_data = $leases_data->paginate(10);
        }
        return $leases_data;
    }
    public function createLease($data)
    {
        $property_id = propertydetail::where('id', $data->property_id)->first();
        if (!$property_id) {
            throw new Exception("Incorrect Property Id");
        }
        $leasesdata = new leases;
        $leasesdata->property_id = $data->property_id;
        $leasesdata->propertyunit_id = $data->propertyunit_id;
        $leasesdata->rent = $data->rent;
        $leasesdata->get_dmy = $data->get_dmy;
        $leasesdata->advance_payments = $data->advance_payments;
        $leasesdata->tenant_id = $data->tenant_id;
        $leasesdata->new_teanants_id = $data->new_teanants_id;
        $leasesdata->lease_start = $data->lease_start;
        $leasesdata->lease_end = $data->lease_end;
        $leasesdata->due_date = $data->due_date;
        $leasesdata->frequency_collection = $data->frequency_collection;
        $leasesdata->total_payment = $data->total_payment;
        $leasesdata->image = $data->image;

        if ($data->hasfile('image')) {

            $file = $data->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;
            $data = $file->move(public_path('/assets/img'), $filename);
            $leasesdata->image = $filename;
        }
        $leasesdata->terms = $data->terms;
        $leasesdata->save();
        $this->rentintallment($leasesdata->id);
    }

    public function rentintallment($id)
    {
        $rentdata = leases::where('id', $id)->first();

        $no_of_ym = $rentdata->get_dmy;
        $payment_my = $rentdata->rent;
        $frequncy = $rentdata->frequency_collection;
        $saleduedate = $rentdata->due_date;
        $leasestartdate = $rentdata->lease_start;
        if ($frequncy  == "monthly") {
            for ($i = 1; $i <= $no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i month");

                $sale_lease_transaction = new renttransaction;
                $sale_lease_transaction->rent_leases_id = $rentdata->id;
                $sale_lease_transaction->due_date = $due_data;
                $sale_lease_transaction->monthly = $i;
                $sale_lease_transaction->payment = $payment_my;
                $sale_lease_transaction->save();
            }
        } else if ($frequncy  == "annually") {

            for ($i = 1; $i < +$no_of_ym; $i++) {
                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i Year");

                $sale_lease_transaction = new renttransaction;
                $sale_lease_transaction->rent_leases_id = $id;
                $sale_lease_transaction->due_date = $due_data;
                $sale_lease_transaction->monthly = $i;
                $sale_lease_transaction->payment = $payment_my;
                $sale_lease_transaction->save();
            }
        } else {
            // daily
            for ($i = 1; $i <= $no_of_ym; $i++) {

                $date = new DateTime($saleduedate);
                $due_data = $date->modify("+$i Day");

                $sale_lease_transaction = new renttransaction;
                $sale_lease_transaction->rent_leases_id = $id;
                $sale_lease_transaction->due_date = $due_data;
                $sale_lease_transaction->monthly = $i;
                $sale_lease_transaction->payment = $payment_my;
                $sale_lease_transaction->save();
            }
        }
    }

    public function storeSaleLease($request)
    {
        $property_id = propertydetail::where('id', $request->property_id)->first();
        if (!$property_id) {
            throw new Exception("Incorrect Property Id");
        }
        $sale_lease = new salelease;
        $sale_lease->property_id = $request->property_id;
        $sale_lease->propertyunit_id = $request->propertyunit_id;
        $sale_lease->total_sale_price = $request->total_sale_price;
        $sale_lease->sale_advance_payment = $request->sale_advance_payment;
        $sale_lease->customer_id = $request->customer_id;
        $sale_lease->remaing_payment = $request->remaing_payment;
        $sale_lease->lease_start = $request->lease_start;
        $sale_lease->lease_end = $request->lease_end;
        $sale_lease->due_date = $request->due_date;
        $sale_lease->frequency_collection = $request->frequency_collection;
        $sale_lease->number_of_years_month = $request->number_of_years_month;
        $sale_lease->payment_per_frequency = $request->payment_per_frequency;
        $sale_lease->image = $request->image;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('/assets/img'), $filename);
            $sale_lease->image = $filename;
        }
        $sale_lease->terms = $request->terms;
        $sale_lease->save();
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
}
