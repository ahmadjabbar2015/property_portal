<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agent;
use Datatables;
use DB;
class AgentController extends Controller
{
    //saad
    public function create()
    {
    
      return view('agent.create');
    }
    public function index(Request $request)
    {
        
        $data = agent::latest()->get();
      
        if ($request->ajax()) {
           
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/agent/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/agent/edit/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/agent/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('agent.index');
    }
    public function store(Request $request)
    {
        // dd($request);
    
        $agents=new agent;
        $agents->name=$request->name;
       
        $agents->email=$request->email;
        $agents->number=$request->number;
        $agents->address=$request->address;
        
        $agents->save();
           
            $flas_message =  toastr()->success('agent Addedd Successfully');
            return redirect(route('agent.index'))->with('flas_message');
    }
    public function show($id)
    {
        $agents = agent::find($id);
        return view('agent.show')->with('agent', $agents);
    }
    public function update($id, Request $request)
    {
        try {

            $input = $request->except('_token');


            $sql = agent::where('id', $id)->update($input);
            $flas_message =  toastr()->success('Agent Updated Successfully');

            return redirect(route('agent.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('agent.index'))->with('flas_message');
        }
    }
    public function edit($id)
    {
        $agent = agent::find($id);
        return view('agent.edit')->with('agent', $agent);
    }
    public function delete($id)
    {
        try {
            DB::table('agent')->delete($id);
            $flas_message =  toastr()->success('agent Deleted Successfully');

            return redirect(route('agent.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('agent.index'))->with('flas_message');
        }
    }

}
