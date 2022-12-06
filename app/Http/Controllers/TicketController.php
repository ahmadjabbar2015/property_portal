<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ticket;
use Datatables;
use DB;

class TicketController extends Controller
{
    //

    public function index(Request $request)
    {
      
        $data=DB::table('tickets')
        ->leftjoin('users','users.id','=','tickets.users_id')
        ->leftjoin('users as assignuser','assignuser.id','=','tickets.assign_to')
        ->select('tickets.*','users.first_name','assignuser.first_name as assign_name')->get();
        // dd($data);
        // $data =ticket::latest()->get();
        $user_id=Auth::id();
       

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/ticket/show/'.$row->id.'" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('assign_to',function($row){
                    if ($row->assign_to==null) {
                        return '<span class="btn-danger p-1">No Assign</span>';
                    }else{
                        return $row->assign_to;
                    }
                })
                ->rawColumns(['action','assign_to'])
                ->make(true);
        }
        $total_ticket=count($data);
        $ticket_assign=ticket::where('assign_to', '!=', 'null')->count();
        $ticket_pending=ticket::where('assign_to', '=', null)->count();
        

        return view('ticket.index')->with('user_id',$user_id)->with('total_ticket',$total_ticket)->with('ticket_assign',$ticket_assign)->with('ticket_pending',$ticket_pending);
    }
    
    public function store(Request $request)
    {
    // try {
    // dd( $request);
      $tickets=new ticket;
      $tickets->subject=$request->subject;
      $tickets->priority=$request->priority;
      $tickets->description=$request->description;
      $tickets->users_id=1;
      $tickets->status=$request->status;
      $tickets->save();
        return redirect('ticket/index')->with('success', 'ticket Addedd!');
    // } catch (\Throwable $th) {
    //     $flas_message=  toastr()->error('something went wrong');

        return redirect(route('ticket.index'))->with('flas_message');
    }
        
   
    public function  show($id)
    {
      try {
       
        $ticket=DB::table('tickets')
        ->leftjoin('users','users.id','=','tickets.user_id')
        ->leftjoin('users as assignuser','assignuser.id','=','tickets.assign_to')
        ->select('tickets.*','users.name','assignuser.name as assign_name')
        ->where('tickets.id','=',$id)
        ->get();
        
       
        return view('ticket.show')->with('ticket', $ticket);
    } catch (\Throwable $th) {
        $flas_message=  toastr()->error('something went wrong');

        return redirect(route('ticket.index'))->with('flas_message');
    }
    }

}