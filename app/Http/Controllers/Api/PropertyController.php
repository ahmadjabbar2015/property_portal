<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\propertytype;
use App\Models\propertyunits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{

    // Property Units
    
   
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
                'message'   => "Property Added Successfully",
            ];

        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'success'   => false,
                'message'   => $th->getMessage(),
            ];
        }
        
    }
}
