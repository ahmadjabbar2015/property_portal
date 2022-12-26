<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertytype;
use Yajra\DataTables\Facades\DataTables;
use DB;

class propertytypeController extends Controller
{
    //
    public function type(Request $request)
    {

        if (!auth()->user()->hasPermission('Add property Type','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;

        $data = Propertytype::where('bussniess_id',$bussniess_id)->get();



        if ($request->ajax()) {


            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="/propertytype/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('property.type')->with(compact('data'));
    }
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('Add property Type','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $propertytype = new Propertytype;
        $propertytype->type = $request->type;
        $propertytype->description = $request->description;
        $propertytype->bussniess_id = $bussniess_id;

        $propertytype->save();


        return redirect('propertytype')->with('success', 'propertytype Addedd!');
    }
    public function delete($id)
    {

        // try {
        //     DB::table('propertytype')->delete($id);
        //     $flas_message =  toastr()->success('Propertytype Deleted Successfully');
        //     return redirect(route('property.type'))->with('flas_message');
        // } catch (\Throwable $th) {
        //     $flas_message =  toastr()->error('something went wrong');

        //     return redirect(route('property.type'))->with('flas_message');
        // }
    }

}
