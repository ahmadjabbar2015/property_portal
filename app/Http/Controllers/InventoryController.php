<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertyunits;
use App\Models\Propertydetail;
use App\Models\Inventory;
use Illuminate\Support\Facades\Input;
use DB;
use DataTables;

class Inventorycontroller extends Controller
{

    public function create()
    {
        if (!auth()->user()->hasPermission('Inventory','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $propertyunits =Propertyunits::where('bussniess_id',$bussniess_id)->get();
        $property_details = DB::table('propertydetails')

            ->where('bussniess_id',$bussniess_id)

            ->get();

        return view('inventory.create')->with('propertyunits', $propertyunits)->with('property_details', $property_details);
    }


    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Inventory','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $inventorydata = DB::table('inventories')
            ->join('propertydetails', 'propertydetails.id', '=', 'inventories.property_id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'inventories.propertyunit_id')
            ->where('inventories.bussniess_id',$bussniess_id)
            ->select('inventories.*', 'propertydetails.name')
            ->get();


        if ($request->ajax()) {


            return Datatables::of($inventorydata)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/inventory/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/inventory/edit/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/inventory/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('inventory.index');
    }
    public function store(Request $request)
    {

        $bussniess_id=auth()->user()->bussniess_id;
        $inventory = new Inventory;
        $inventory->property_id = $request->property_id;
        $inventory->propertyunit_id = $request->propertyunit_id;
        $inventory->description = $request->description;
        $inventory->bussniess_id=$bussniess_id;
        $inventory->image = $request->image;

        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;

            $data = $file->move(public_path('/assets/img'), $filename);
            $inventory->image = $filename;
        }

        $inventory->unit = $request->unit;
        $inventory->save();
        $flas_message = toastr()->success('Leases Addedd Successfully');
        return redirect(route('inventory.index'))->with('flas_message');
    }
    public function show($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $data = DB::table('inventories')
            ->join('propertydetails', 'propertydetails.id', '=', 'inventories.property_id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'inventories.propertyunit_id')
            ->select('inventories.*', 'propertydetails.name')
            ->where('inventories.bussniess_id',$bussniess_id)
            ->where('inventories.id', '=', $id)
            ->get();
        return view('inventory.show')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        try {

            $input = $request->except('_token');
            if ($request->hasfile('image')) {


                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;

                $data = $file->move(public_path('/assets/img'), $filename);
                $input['image'] = $filename;
            }

            $sql = Inventory::where('id', $id)->update($input);
            $flas_message =  toastr()->success('Inventory Updated Successfully');

            return redirect(route('inventory.index'))->with('flas_message');
        } catch (\Throwable $th) {
            $flas_message =  toastr()->error('something went wrong');

            return redirect(route('inventory.index'))->with('flas_message');
        }
    }
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        // $customers = customer::all();
        $propertydetails =Propertydetail::all();
        $propertyunits = Propertyunits::all();
        $inventory = DB::table('inventories')
            ->join('propertydetails', 'propertydetails.id', '=', 'inventories.property_id')
            ->leftjoin('propertyunits', 'propertyunits.id', '=', 'inventories.propertyunit_id')
            ->select('inventories.*', 'propertydetails.name','propertyunits.title')
            ->where('inventories.id', '=', $id)
            ->first();
        // dd($inventory);
        return view('inventory.edit')->with('inventory', $inventory)->with('propertydetail', $propertydetails)->with('propertyunits', $propertyunits);
    }
}
