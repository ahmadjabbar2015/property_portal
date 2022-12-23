<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Attempt;
use App\Models\Customer;
use App\Models\Propertytype;
use App\Models\Source;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB as FacadesDB;

class Lead_reportsController extends Controller
{

    public function index(Request $request)

    {


        if (!auth()->user()->hasPermission('Reports','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        if ($request->ajax()) {

            $data = Lead::join('attempts', 'attempts.id', '=', 'leads.id')
                ->join('propertytype', 'propertytype.id', '=', 'leads.propertytype_id')
                ->join('sources', 'sources.id', '=', 'leads.source_id')
                ->join('users', 'users.id', '=', 'leads.user_id')
                ->where('leads.bussniess_id',$bussniess_id)
                ->select('leads.*',  'attempts.lead_status', 'attempts.next_follow_date', 'propertytype.type', 'sources.source', 'users.first_name');


            if (!empty($request->input('start_date'))) {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $newDate = date("Y-m-d", strtotime($start_date));
                $newDate1 = date("Y-m-d", strtotime($end_date));
                $data->whereBetween(FacadesDB::raw('DATE(leads.created_at)'), [$newDate, $newDate1]);
            }

            if (!empty($request->input('propertytype_id'))) {
                $propertytype_id = $request->propertytype_id;
                $data->where('propertytype.id', '=', $propertytype_id);
            }
            if (!empty($request->input('source_id'))) {
                $source_id = $request->source_id;
                $data->where('sources.id', '=', $source_id);
            }
            if (!empty($request->input('client_contact'))) {
                $client_contact = $request->client_contact;
                $data->where('leads.id', '=', $client_contact);
            }


            if (!empty($request->input('first_name'))) {
                $first_name = $request->first_name;
                $data->where('users.id', '=', $first_name);
            }
            // dd($data);


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/lead_reports/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $propertytype = Propertytype::where('bussniess_id',$bussniess_id)->get();
        $source = Source::where('bussniess_id',$bussniess_id)->get();
        $lead = Lead::where('bussniess_id',$bussniess_id)->get();
        $user = User::where('bussniess_id',$bussniess_id)->get();
        return view('lead_reports.index')->with(compact('propertytype', 'source', 'lead', 'user'));
    }

    public function show($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $lead = Lead::
        join('propertytype', 'propertytype.id', '=', 'leads.propertytype_id')
        ->join('sources', 'sources.id', '=', 'leads.source_id')
        ->join('users', 'users.id', '=', 'leads.user_id')
        ->select('leads.*', 'propertytype.type', 'sources.source', 'users.first_name')
        ->where('leads.bussniess_id',$bussniess_id)
        ->where('leads.id','=',$id)
        ->first();
        $attempt = Attempt::where('bussniess_id',$bussniess_id)->find($id);
        $customer=Customer::where('bussniess_id',$bussniess_id)->find($id);
        return view('lead_reports.show')->with(compact('lead','attempt','customer'));
    }
}
