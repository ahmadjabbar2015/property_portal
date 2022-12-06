<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tenants;
use DataTables;
use Illuminate\Support\Facades\Input;

use DB;

class TenantsController extends Controller
{
    //saad
   
    public function create()
    {

        return view('tenants.create');
    }
    public function store(Request $request)
    {
        try {

            $request->validate([

                'full_name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'address' => 'required',

            ]);

            $tenants = new tenants;
            $tenants->full_name = $request->full_name;
            $tenants->email = $request->email;
            $tenants->number = $request->number;
            $tenants->identity = $request->identity;
            $tenants->address = $request->address;
            $tenants->occupation = $request->occupation;
            $tenants->place = $request->place;
            $tenants->emrgency_name = $request->emrgency_name;
            $tenants->emrgency_number = $request->emrgency_number;
            $tenants->image = $request->image;


            if ($request->hasfile('image')) {


                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;

                $data = $file->move(public_path('/assets/img'), $filename);
                $tenants->image = $filename;
            }
            $tenants->save();
            $flas_message =  toastr()->success('Tenants Addedd Successfully');
            return redirect(route('tenants.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('tenants.create'))->with('flas_message');
        }
    }



    public function index(Request $request)
    {

        $data = tenants::latest()->get();

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/tenants/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/tenants/edit/' . $row->id . '" class="edit btn btn-success btn-sm"> <i class="fa-solid fa-file-pen"></i></a>
                    <a href="/tenants/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('tenants.index')->with(compact('data'));
    }
    public function edit($id)
    {
        $tenants = tenants::find($id);
        return view('tenants.edit')->with('tenants', $tenants);
    }
    public function update(Request $request, $id)
    {
        try {

            $input = $request->except('_token');

            
            // $tenants = new tenants;
            if ($request->hasfile('image')) {


                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;
    
                $data = $file->move(public_path('/assets/img'), $filename);
                $input['image'] = $filename;
            }

            $sql = tenants::where('id', $id)->update($input);
            $flas_message =  toastr()->success('Tenants Updated Successfully');

            return redirect(route('tenants.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('tenants.index'))->with('flas_message');
        }
    }
    public function delete($id)
    {
        try {
            DB::table('tenants')->delete($id);
            $flas_message =  toastr()->success('Tenants Deleted Successfully');

            return redirect(route('tenants.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('tenants.index'))->with('flas_message');
        }
    }
    public function show($id)
    {
        
        $tenants = tenants::find($id);
        return view('tenants.show')->with('tenants', $tenants);
    }
}
