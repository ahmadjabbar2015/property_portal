<?php

namespace App\Http\Controllers;


use App\Models\Propertyunits;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class propertyunitsController extends Controller
{

    public function create()
    {
        if (!auth()->user()->hasPermission('Property Units','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $property = DB::table('propertydetails')

            ->where('bussniess_id',$bussniess_id)

            ->get();
        // $propertyunits = propertyunits::where('bussniess_id',$bussniess_id);

        return view('propertyunits.create')->with(compact( 'property'));
    }
    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Property Units','view')){
            return redirect(route('404'));
        }
        try {
            $bussniess_id=auth()->user()->bussniess_id;

        $data = DB::table('propertyunits')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
            ->where('propertyunits.bussniess_id',$bussniess_id)
            ->select('propertyunits.*', 'propertydetails.name')
            ->get();




        if ($request->ajax()) {


            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/propertyunits/show/' . $row->id . '" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/propertyunits/edit/' . $row->id . '" class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="/propertyunits/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('propertyunits.index')->with(compact('data'));
    } catch (\Throwable $th) {
        $flas_message =  toastr()->error('something went wrong');

            return redirect(route('propertyunits.index'))->with('flas_message');
    }
    }
    public function store(Request $request)
    {
        try {
            $bussniess_id=auth()->user()->bussniess_id;
        $propertyunit = new Propertyunits;
        $propertyunit->property_id = $request->property_id;
        $propertyunit->title = $request->title;


        $propertyunit->description = $request->description;
        $propertyunit->bussniess_id = $bussniess_id;

        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;

            $data = $file->move(public_path('/assets/img'), $filename);
            $propertyunit->image = $filename;
        }

        $propertyunit->save();
        return redirect(route('propertyunits.index'))->with('success', 'propertyunits Addedd!');
    }
     catch (\Throwable $th) {
        $flas_message =  toastr()->error('something went wrong');

        return redirect(route('propertyunits.create'))->with('flas_message');
    }
    }
    public function show($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $propertyunits = DB::table('propertyunits')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
            ->select('propertyunits.*', 'propertydetails.name')
            ->where('propertyunits.bussniess_id',$bussniess_id)
            ->where('propertyunits.id', '=', $id)
            ->get();



        return view('propertyunits.show')->with('propertyunits', $propertyunits);
    }
    public function delete($id)
    {

        // DB::table('propertyunits')->delete($id);
        // $flas_message =  toastr()->success('propertyunits Deleted Successfully');

        // return redirect(route('propertyunits.index'))->with('flas_message');
    }
    public function edit($id)
    {
        // $property = DB::table('propertydetails')
        //     ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
        //     ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
        //     ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
        //     ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
        //     ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
        //     ->select(
        //         'propertydetails.*',
        //         'property_location.search',
        //         'property_location.address',
        //         'property_location.city',
        //         'property_location.state',
        //         'property_location.post',
        //         'amenities.propertynote',
        //         'amenities.age',
        //         'amenities.room',
        //         'amenities.bedroom',
        //         'amenities.bathroom',
        //         'amenities.animities',
        //         'propertyimages.propertyimage',
        //         'propertytype.type as propertytype_name',
        //         'landlords.full_name as landlord_name'
        //     )
        //     ->get();
        // $propertyunits = DB::table('propertyunits')
        //     ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
        //     ->select('propertyunits.*', 'propertydetails.name')
        //     ->where('propertyunits.id', '=', $id)
        //     ->get();

        // return view('propertyunits.edit')->with('propertyunits', $propertyunits)->with('property', $property);
    }
    // public function update(Request $request, $id)
    // {


    //     $input = $request->except('_token');



    //     if ($request->hasfile('image')) {


    //         $file = $request->file('image');
    //         $extention = $file->getClientoriginalExtension();
    //         $filename = time() . '.' . $extention;

    //         $data = $file->move(public_path('/assets/img'), $filename);
    //         $input['image'] = $filename;
    //     }


    //     $sql = propertyunits::where('id', $id)->update($input);

    //     $flas_message =  toastr()->success('propertyunits Updated Successfully');

    //     return redirect(route('propertyunits.index'))->with('flas_message');
    // }
}
