<?php

namespace App\Http\Controllers;


use App\Models\propertyunits;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class propertyunitsController extends Controller
{
    //saad
    public function create()
    {

        $property = DB::table('propertydetails')
            ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
            ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->select(
                'propertydetails.*',
                'property_location.search',
                'property_location.address',
                'property_location.city',
                'property_location.state',
                'property_location.post',
                'amenities.propertynote',
                'amenities.age',
                'amenities.room',
                'amenities.bedroom',
                'amenities.bathroom',
                'amenities.animities',
                'propertyimages.propertyimage',
                'propertytype.type as propertytype_name',
                'landlords.full_name as landlord_name'
            )
            ->get();
        $propertyunits = propertyunits::all();

        return view('propertyunits.create')->with(compact('propertyunits', 'property'));
    }
    public function index(Request $request)
    {
        // dd( $request);
        $data = DB::table('propertyunits')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
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
    }
    public function store(Request $request)
    {
        // dd($request);

        

        $propertyunit = new propertyunits;
        $propertyunit->property_id = $request->property_id;
        $propertyunit->title = $request->title;
        $propertyunit->commission = $request->commission;
        $propertyunit->details = $request->details;
        $propertyunit->description = $request->description;
        // $propertyunit->image = $request->image;
        // dd($propertyunit);
        if ($request->hasfile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientoriginalExtension();
            $filename = time() . '.' . $extention;

            $data = $file->move(public_path('/assets/img'), $filename);
            $propertyunit->image = $filename;
        }
        // dd($propertyunit);
        $propertyunit->save();
        return redirect('propertyunits')->with('success', 'propertyunits Addedd!');
    }
    public function show($id)
    {
        $propertyunits = DB::table('propertyunits')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
            ->select('propertyunits.*', 'propertydetails.name')
            ->where('propertyunits.id', '=', $id)
            ->get();



        return view('propertyunits.show')->with('propertyunits', $propertyunits);
    }
    public function delete($id)
    {

        DB::table('propertyunits')->delete($id);
        $flas_message =  toastr()->success('propertyunits Deleted Successfully');

        return redirect(route('propertyunits.index'))->with('flas_message');
    }
    public function edit($id)
    {
        $property = DB::table('propertydetails')
            ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
            ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertyimages', 'propertyimages.property_id', '=', 'propertydetails.id')
            ->leftjoin('propertytype', 'propertytype.id', '=', 'propertydetails.propertytype_id')
            ->leftjoin('landlords', 'landlords.id', '=', 'propertydetails.landlord_id')
            ->select(
                'propertydetails.*',
                'property_location.search',
                'property_location.address',
                'property_location.city',
                'property_location.state',
                'property_location.post',
                'amenities.propertynote',
                'amenities.age',
                'amenities.room',
                'amenities.bedroom',
                'amenities.bathroom',
                'amenities.animities',
                'propertyimages.propertyimage',
                'propertytype.type as propertytype_name',
                'landlords.full_name as landlord_name'
            )
            ->get();
        $propertyunits = DB::table('propertyunits')
            ->leftjoin('propertydetails', 'propertydetails.id', '=', 'propertyunits.property_id')
            ->select('propertyunits.*', 'propertydetails.name')
            ->where('propertyunits.id', '=', $id)
            ->get();

        return view('propertyunits.edit')->with('propertyunits', $propertyunits)->with('property', $property);
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


        $sql = propertyunits::where('id', $id)->update($input);

        $flas_message =  toastr()->success('propertyunits Updated Successfully');

        return redirect(route('propertyunits.index'))->with('flas_message');
    }
}
