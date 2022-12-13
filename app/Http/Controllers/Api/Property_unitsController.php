<?php

namespace App\Http\Controllers\Api;

use App\Models\Propertyunits;
use App\Http\Resources\CommonResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Property_unitsController extends Controller
{
    //
    public function getPropertyUnits()
    {

        $propertyunits = Propertyunits::with(['propertydetail','location' , 'amenities' , 'propertyImages'])->get();
        // dd($propertyunits);
        return CommonResource::collection($propertyunits);
            
       
    }

    public function showPropertyunit($id)
    {
        $property_units = propertyunits::where('id', $id)->get();

        return  CommonResource::collection($property_units);
    }
    public function storePropertyUnit(Request $request)
    {
        try {
            DB::beginTransaction();
            $propertyunit = new propertyunits;
            $propertyunit->property_id = $request->property_id;
            $propertyunit->title = $request->title;
            $propertyunit->commission = $request->commission;
            $propertyunit->details = $request->details;
            $propertyunit->description = $request->description;

            if ($request->hasfile('image')) {


                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;

                $data = $file->move(public_path('/assets/img'), $filename);
                $propertyunit->image = $filename;
            }
            $propertyunit->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "PropertyUnits Added Successfully",
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
