<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landlord;
use App\Models\propertydetail;
use App\Models\location;
use App\Models\propertytype;
use App\Models\amenitie;
use App\Models\propertyimage;
use DB;
use Datatables;
class PropertyController extends Controller
{
    //saad
    public function index(Request $request)
    {

        $data=DB::table('propertydetails')
        ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
        ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
        ->leftjoin('propertyimages','propertyimages.property_id','=','propertydetails.id')
        ->leftjoin('propertytype','propertytype.id','=','propertydetails.propertytype_id')
        ->leftjoin('landlords','landlords.id','=','propertydetails.landlord_id')
        ->select('propertydetails.*', 'property_location.search',
        'property_location.address',
        'property_location.city',
        'property_location.state',
        'property_location.post'
        ,'amenities.propertynote'
        ,'amenities.age'
        ,'amenities.room'
        ,'amenities.bedroom'
        ,'amenities.bathroom'
        ,'amenities.animities'
        ,'propertyimages.propertyimage'
        ,'propertytype.type as propertytype_name'
        ,'landlords.full_name as landlord_name'
        )
        ->get();
        
       
        if ($request->ajax()) {
          

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/propertyshow/'.$row->id.'" class="show btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="/property/edit/'.$row->id.'" class="edit btn btn-success btn-sm"> <i class="fa-solid fa-file-pen"></i></a>
                    <a href="#" class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('property.index');

    }
    public function create()
    {
        try {
        $landlord = landlord::all();
        $propertytype = propertytype::all();
        return view('property.create')->with('landlord', $landlord)->with('propertytype', $propertytype);
        } catch (\Throwable $th) {
            $flas_message=  toastr()->error('something went wrong');

            return redirect(route('property.create'))->with('flas_message');
        }
    }
    public function Store(Request $request)
    {
        $input = $request->except('_token');
        

        $request->validate([

            'name' =>'required',
            'rent' => 'required',
            // 'type' => 'required',
            // 'landlord' => 'required',
            'description' => 'required',

        ]);
       
       $result= propertydetail::create($input);
        return $result;

    }
    public function location(Request $request)
    {
        
        $input = $request->all();
        
       
        $result= location::create($input);
        return $result;
    
    }
    public function amenities(Request $request)
    {
        $amenities=new amenitie;
        $amenities->property_id=$request->property_id;
        $amenities->propertynote=$request->propertynote;
        $amenities->age=$request->age;
        $amenities->room=$request->room;
        $amenities->bedroom=$request->bedroom;
        $amenities->bathroom=$request->bathroom;

        $amenities->animities=json_encode($request->animities);
      $amenities->save();
        return $amenities;
    }
    public function imageadd(Request $request )
    {
        try {
       $propertyimage=new propertyimage;
       $propertyimage->property_id=$request->property_id;
       $propertyimage->propertyimage=$request->propertyimage;
       if ($request->hasfile('propertyimage'))
            {
       
                
                        $file=$request->file('propertyimage');
                        $extention=$file->getClientoriginalExtension();
                        $filename=time().'.'.$extention;
                        
                        $data=$file->move(public_path('/assets/img'),$filename);
                        $propertyimage->propertyimage=$filename;
            }
        $propertyimage->save();
        $flas_message=  toastr()->success('Property Addedd Successfully');
       return redirect(route('property.index'))->with('flas_message');
    } catch (\Throwable $th) {
        $flas_message=  toastr()->error('something went wrong');

        return redirect(route('property.create'))->with('flas_message');
    }
    }
    public function show($id)
    {
        try {
           
        
        $data=DB::table('propertydetails')
        ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
        ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
        ->leftjoin('propertyimages','propertyimages.property_id','=','propertydetails.id')
        ->leftjoin('propertytype','propertytype.id','=','propertydetails.propertytype_id')
        ->leftjoin('landlords','landlords.id','=','propertydetails.landlord_id')
        ->select('propertydetails.*', 'property_location.search',
        'property_location.address',
        'property_location.city',
        'property_location.state',
        'property_location.post'
        ,'amenities.propertynote'
        ,'amenities.age'
        ,'amenities.room'
        ,'amenities.bedroom'
        ,'amenities.bathroom'
        ,'amenities.animities'
        ,'propertyimages.propertyimage'
        ,'propertytype.type as propertytype_name'
        ,'landlords.full_name as landlord_name'
        )
        ->where('propertydetails.id','=',$id)
        ->get();
        
        return view('property.show')->with(compact('data'));
    
    } catch (\Throwable $th) {
        $flas_message=  toastr()->error('something went wrong');

        return redirect(route('property.index'))->with('flas_message');
    }
    }
    public function edit($id)
    {
        $data=DB::table('propertydetails')
        ->leftjoin('property_location', 'property_location.property_id', '=', 'propertydetails.id')
        ->leftjoin('amenities', 'amenities.property_id', '=', 'propertydetails.id')
        ->leftjoin('propertyimages','propertyimages.property_id','=','propertydetails.id')
        ->leftjoin('propertytype','propertytype.id','=','propertydetails.propertytype_id')
        ->leftjoin('landlords','landlords.id','=','propertydetails.landlord_id')
        ->select('propertydetails.*', 'property_location.search',
        'property_location.address',
        'property_location.city',
        'property_location.state',
        'property_location.post'
        ,'amenities.propertynote'
        ,'amenities.age'
        ,'amenities.room'
        ,'amenities.bedroom'
        ,'amenities.bathroom'
        ,'amenities.animities'
        ,'propertyimages.propertyimage'
        ,'propertytype.type as propertytype_name'
        ,'landlords.full_name as landlord_name'
        )
        ->where('propertydetails.id','=',$id)
        ->first();
        $propertytype = propertytype::all();
        $landlord = landlord::all();


        return view('property.edit')->with(compact('data','propertytype','landlord'));
    }
    public function update(Request $request,$id)
    {
        try {
            
       
        } catch (\Throwable $th) {
            $flas_message=  toastr()->error('something went wrong');

            return redirect(route('property.index'))->with('flas_message');
        }
       
    }
}


