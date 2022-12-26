<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Landlord;
use Livewire\Component;
use App\Models\Lead;
use App\Models\Propertydetail;
use App\Models\Salelease;
use App\Models\Leases;
use App\Models\Tenants;
use App\Models\Renttransaction;
use Redirect,Response;
Use DB;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        $bussniess_id=auth()->user()->bussniess_id;
         $leadDataCount = Lead::where('bussniess_id',$bussniess_id)->get();
         $status = $leadDataCount->filter(function ($row)
         {
            return $row['attempt_status'] == 1;
         });

         $statusAttempt = $leadDataCount->filter(function ($row)
         {
            return $row['attempt_status'] == 0;
         });

           $totalPropertyCount  = Propertydetail::where('bussniess_id',$bussniess_id)->get();
           $totalSaleLeaseCount  = Salelease::where('bussniess_id',$bussniess_id)->get();
           $totalRentLeaseCount  = Leases::where('bussniess_id',$bussniess_id)->get();
           $tenantCount  = Tenants::where('bussniess_id',$bussniess_id)->get();
           $customerCount  = Customer::where('bussniess_id',$bussniess_id)->get();
           $landloadCount  = Landlord::where('bussniess_id',$bussniess_id)->get();

         //   Saleease chart
            $users = Salelease::select(DB::raw("SUM(total_sale_price) as count"), DB::raw("DAYNAME(created_at) as month_name"))
            ->where('saleleases.bussniess_id',$bussniess_id)
           ->whereYear('created_at', date('Y'))
           ->groupBy(DB::raw("Day(created_at)"))
           ->groupBy("saleleases.created_at")
           ->groupBy('saleleases.total_sale_price','saleleases.bussniess_id')
           ->pluck('count', 'month_name');

            $labels = $users->keys();
            $datapayment = $users->values();


            // Leads charts

            $record = Lead::select(DB::raw("COUNT(*) as count"),DB::raw("DAYNAME(created_at) as day_name"),
       DB::raw("DAY(created_at) as day"))
       ->where('bussniess_id',$bussniess_id)
      ->where('created_at', '>', Carbon::today()->subDay(6))
      ->whereYear('created_at', date('Y'))
      ->groupBy(DB::raw("Day(created_at)"))
      ->groupBy('day_name','day','bussniess_id')
      ->orderBy('day')
      ->get();


      $recordStu= Lead::select(DB::raw("COUNT(attempt_status) as count"),DB::raw("attempt_status"))
      ->where("attempt_status" , 1)
      ->where('bussniess_id',$bussniess_id)
     ->where('created_at', '>', Carbon::today()->subDay(6))
     ->whereYear('created_at', date('Y'))
     ->groupBy(DB::raw("Day(created_at)"))
     ->groupBy('attempt_status','bussniess_id')
     ->orderBy('attempt_status')

     ->get();

      $leaddata = [];
      $leadstaus = [];
      foreach($record as $row)
      {
        $leaddata['label'][] = $row->day_name;
        $leaddata['data'][] = (int) $row->count;
      }

      foreach($recordStu as $row)
      {
        $leadstaus['customer'][] = (int) $row->count;
      }
    $leaddata['chart_data'] = json_encode($leaddata);
    $chart_customer= json_encode($leadstaus);


    // only Rent Lease total paymnet charts by Week wise

    $statusRentOne = Renttransaction::select(DB::raw("SUM(payment) as totalpayment"),DB::raw("(DATE_FORMAT(due_date, '%M')) as month"))
    ->Where("status" , 1)
    ->Where("bussniess_id",$bussniess_id)
    ->groupBy("due_date")
    ->pluck('totalpayment', 'month');

    $rentStatsLabels =$statusRentOne->keys();
    $rentStatusData =$statusRentOne->values();


    $statusRentZero = Renttransaction::select(DB::raw("SUM(payment) as payment"),DB::raw("(DATE_FORMAT(due_date, '%M')) as month"))
    ->Where("status" , 0)
    ->Where("bussniess_id",$bussniess_id)
    ->groupBy("due_date")
    ->pluck('payment', 'month');

    $rentStatsZeroLabels =$statusRentZero->keys();
    $rentStatusZeroData =$statusRentZero->values();


            return view('dashboard',compact('leadDataCount' , 'status' , 'statusAttempt' , 'totalPropertyCount',
            'totalSaleLeaseCount', 'totalRentLeaseCount' , 'tenantCount' ,'customerCount', 'landloadCount',
            'labels', 'datapayment' , 'chart_customer','rentStatsLabels', 'rentStatusData' , 'rentStatsZeroLabels' , 'rentStatusZeroData'), $leaddata  );
    }
}
