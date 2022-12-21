<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utils\PropertyUtil;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\CommonResource;
use App\Http\Resources\PropertyResource;
use App\Models\propertydetail;
use App\Models\propertyimage;
use App\Models\propertytype;
use App\Models\propertyunits;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{


    public $propertyUtil;

    public function __construct( PropertyUtil $propertyUtil)
    {
        $this->propertyUtil = $propertyUtil;
    }
    // Property Units
    
    public function getPropertyUnits(){
        $property_units =propertyunits::get();
        return CommonResource::collection($property_units);
    }

    // Proerty Types

    public function getPropertyTypes(){
        $property_type = propertytype::get() ;
        return CommonResource::collection($property_type);
    }

    public function showPropertyType($id){
        $property_type = propertytype::where('id' , $id)->get() ;
        return CommonResource::collection($property_type);
    }

    public function storePropertytype( Request $request)
    {
        try {
            DB::beginTransaction();
                $propertytype = new propertytype;
                $propertytype->type = $request->type;
                $propertytype->description = $request->description;
                $propertytype->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Tenant Added Successfully",
            ];

        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'success'   => false,
                'message'   => $th->getMessage(),
            ];
        }
        
    }


    // Properties 

    public function index()
    {
        $property = propertydetail::with(['location' , 'amenities' , 'propertyImages'])->get();
        return PropertyResource::collection($property);

    }

    public function show($id)
    {
        $property = propertydetail::with(['location' , 'amenities' , 'propertyImages'])->where('id' , $id)->get();
        return PropertyResource::collection($property);

    }

    public function store(PropertyRequest $request){
        try{
            DB::beginTransaction();
            $property_details_array = [
            'name' => $request->name,
            'rent' => $request->rent,
            'propertytype_id' => $request->propertytype_id,
            'landlord_id' => $request->landlord_id,
            'description' => $request->description,
            'area' => $request->area,
            'deposit' => $request->deposit
            ];
            $property_details = propertydetail::create($property_details_array);

            $property_data = [
                'property_images' => $request->property_images,
                'property_amenities' =>$request->property_amenities,
                'property_location' => $request->property_location
            ];

            $this->propertyUtil->createProperty($property_data, $property_details );
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Property Added Successfully",
            ];
       }catch(Exception $e){
            return [
                'success'   => false,
                'message'   => $e->getMessage(),
            ];
        }
    }
}
