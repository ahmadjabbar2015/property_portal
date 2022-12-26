<?php

namespace App\Http\Controllers;
use App\Models\Landlord;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class LandlordController extends Controller
{


    public function create()
    {
        if (!auth()->user()->hasPermission('Landlords','create')){
            return redirect(route('404'));
        }
        return view('landlord.create');
    }
    public function store(Request $request)
    {
        $bussniess_id=auth()->user()->bussniess_id;

        $input = $request->all();

        $landlord=new Landlord;
        $landlord->full_name=$request->full_name;
        $landlord->email=$request->email;
        $landlord->number=$request->number;
        $landlord->identity=$request->identity;
        $landlord->address=$request->address;
        $landlord->occupation=$request->occupation;
        $landlord->account=$request->account;
        $landlord->bussniess_id=$bussniess_id;
        $landlord->image=$request->image;


        if ($request->hasfile('image'))
            {


                        $file=$request->file('image');
                        $extention=$file->getClientoriginalExtension();
                        $filename=time().'.'.$extention;

                        $data=$file->move(public_path('/assets/img'),$filename);
                        $landlord->image=$filename;
            }
        $landlord->save();

        $flas_message =  toastr()->success('Landlord Addedd Successfully');
        return redirect(route('landlord.index'))->with('flas_message');
    }
    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Landlords','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $data = Landlord::where('bussniess_id',$bussniess_id)->get();

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/landlord/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/landlord/edit/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/landlord/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('landlord.index')->with(compact('data'));
    }
    public function edit($id)
    {

        $landlords =Landlord::find($id);

        return view('landlord.edit')->with(compact('landlords'));
    }
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;

            $data = $file->move(public_path('/assets/img'), $filename);
            $input['image'] = $filename;
        }


        $sql = Landlord::where('id', $id)->update($input);

        $flas_message =  toastr()->success('Landlord updated Successfully');
        return redirect(route('landlord.index'))->with('flas_message');
    }
    public function show($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $landlord =Landlord::where('bussniess_id',$bussniess_id)->find($id);
        return view('landlord.show')->with('landlord', $landlord);
    }
    public function delete($id)
    {
        // FacadesDB::table('landlords')->delete($id);
        // $flas_message =  toastr()->success('Landlord Deleted Successfully');
        // return redirect(route('landlord.index'))->with('flas_message');
    }
}

