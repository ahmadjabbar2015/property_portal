<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Source;
use App\Models\User;
use App\Models\propertytype;
use DB;
use Datatables;
use Symfony\Component\HttpFoundation\RequestStack;

class LeadController extends Controller
{
  //
  public  function create()
  {
    if (!auth()->user()->hasPermission('Lead','create')){
        return redirect(route('404'));
    }
    $bussniess_id=auth()->user()->bussniess_id;
    $propertytypes =Propertytype::where('bussniess_id',$bussniess_id)->get();
    $sources = Source::where('bussniess_id',$bussniess_id)->get();
    return view('lead.create')->with('source', $sources)->with('propertytype', $propertytypes);
  }
  public function store(Request $request)
  {

    $bussniess_id=auth()->user()->bussniess_id;


    $leads = new Lead;
    $leads->client_name = $request->client_name;
    $leads->client_contact = $request->client_contact;
    $leads->client_mail = $request->client_mail;
    $leads->clinet_location = $request->clinet_location;
    $leads->propertytype_id = $request->propertytype_id;
    $leads->source_id = $request->source_id;
    $leads->status = $request->status;
    $leads->remark = $request->remark;
    $leads->user_id = $request->user()->id;
    $leads->bussniess_id=$bussniess_id;
    // dd($leads);
    $leads->save();
    $flas_message =  toastr()->success('Leads Addedd Successfully');
    return redirect(route('lead.index'))->with('flas_message');
  }
  public function index(Request $request)
  {
    if (!auth()->user()->hasPermission('Lead','view')){
        return redirect(route('404'));
    }
    $bussniess_id=auth()->user()->bussniess_id;
    $data =Lead::with('propertyType', 'source', 'users')->where('bussniess_id',$bussniess_id)->where('attempt_status', 0)->get();
    if ($request->ajax()) {

      return Datatables::of($data)

        ->rawColumns(['action'])
        ->addIndexColumn()
        ->addColumn('propertyType', function ($row) {
          return $row->propertyType->type;
        })

        ->addIndexColumn()
        ->addColumn('source', function ($row) {
          return $row->source->source;
        })
        ->addIndexColumn()
        ->addColumn('users', function ($row) {
          return $row->users->first_name . ' ' . $row->users->last_name;
        })

        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="/lead/attempt/' . $row->id . '"  class="show btn btn-info btn-sm">Attempt</a>';
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
    return view('lead.index')->with(compact('data'));
  }

  public function attempt($id)
  {
    $bussniess_id=auth()->user()->bussniess_id;
    $lead = Lead::where('id', $id)->where('bussniess_id',$bussniess_id)->with('propertyType', 'source')->first();
    $propertytypes =Propertytype::where('bussniess_id',$bussniess_id)->get();
    $sources =Source::where('bussniess_id',$bussniess_id)->get();

    return view('lead.attempt')->with('source', $sources)->with('propertytype', $propertytypes)->with('lead', $lead);
  }
  public function update($id, Request $request)
  {

    $bussniess_id=auth()->user()->bussniess_id;
    $attempt = new Attempt();
    $attempt->client_name = $request->client_name;
    $attempt->client_contact = $request->client_contact;
    $attempt->client_mail = $request->client_mail;
    $attempt->clinet_location = $request->clinet_location;
    $attempt->propertytype_id = $request->propertytype_id;
    $attempt->area_minimum = $request->area_minimum;
    $attempt->area_maximum = $request->area_maximum;
    $attempt->source_id = $request->source_id;
    $attempt->budget_minimum = $request->budget_minimum;
    $attempt->budget_maximum = $request->budget_maximum;
    $attempt->lead_status = $request->lead_status;
    $attempt->class_status = $request->class_status;
    $attempt->next_follow_date = $request->next_follow_date;
    $attempt->aad_remark = $request->aad_remark;
    $attempt->bussniess_id=$bussniess_id;
    $attempt->lead_id = $id;
    $attempt->save();

    Lead::where('id', $id)->where('bussniess_id',$bussniess_id)->update(['attempt_status' => 1]);
    $flas_message =  toastr()->success('Lead Updated Successfully');
    return redirect()->route('lead.attempt_index');
  }


  public function attempt_index(Request $request)
  {

    $bussniess_id=auth()->user()->bussniess_id;
    $data =Attempt::where('bussniess_id',$bussniess_id)->with('propertyType', 'source')->get();

    if ($request->ajax()) {

      return Datatables::of($data)

        ->addIndexColumn()
        ->addColumn('propertyType', function ($row) {
          return $row->propertyType->type;
        })

        ->addIndexColumn()
        ->addColumn('source', function ($row) {
          return $row->source->source;
        })
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="/lead/attempt_edit/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-regular fa-circle-left fa-lg"></i></a>
          <a href="/customer/' . $row->id . '" class="show btn btn-info btn-sm" id="lead_button"><i class="fa-regular fa-circle-check fa-lg"></i></a>';

          return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    return view('lead.attempt_index')->with(compact('data'));
  }
  public function checknumber($id)
  {
    $bussniess_id=auth()->user()->bussniess_id;
    $leadscheck =Lead::where('bussniess_id',$bussniess_id)->where('client_contact', $id)->count();
    if ($leadscheck != 0) {
      return 1;
    } else {
      return 0;
    }
  }
  public function attempt_edit($id)
  {
    $bussniess_id=auth()->user()->bussniess_id;
    $propertytype = Propertytype::where('bussniess_id',$bussniess_id);
    $lead =Lead::where('bussniess_id',$bussniess_id);
    $attempts =Attempt::where('bussniess_id',$bussniess_id)->find($id);
    return view('lead.attempt_edit')->with('attempt', $attempts)->with('lead',$lead)->with('propertytype',$propertytype);
  }
  public function attempt_update ( Request $request, $id)
  {
    $bussniess_id=auth()->user()->bussniess_id;
    $input = $request->except('_token');
    $sql =Attempt::where('bussniess_id',$bussniess_id)->where('id', $id)->update($input);
    $flas_message =  toastr()->success('Attempt Updated Successfully');

    return redirect(route('lead.attempt_index'))->with('flas_message');
  }
}
