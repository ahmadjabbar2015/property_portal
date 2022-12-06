<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\source;
use DataTables;
use DB;
class SourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function source_create()
    // {

    //    return view(' source.create');
    // }
    //
    public function store(Request $request)
    {
        $Sources = new source;
        $Sources->source = $request->source;
        $Sources->save();
        $flas_message =  toastr()->success('Source Addedd Successfully');
        return redirect(route('source.index'))->with('flas_message');
    }
    public function index( Request $request)
    {
        $data = source::latest()->get();

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <a href="/source/delete/' . $row->id . '"class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view(' source.index');
    }
    public function delete($id)
    {
        
        try {
            DB::table('sources')->delete($id);
            $flas_message =  toastr()->success('Source Deleted Successfully');
            return redirect(route('source.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('source.index'))->with('flas_message');
        }
    }
}
