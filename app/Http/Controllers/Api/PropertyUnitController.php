<?php

namespace App\Http\Controllers\Api;

use App\Models\Propertyunits;
use App\Http\Resources\CommonResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PropertyUnitsRequest;

class PropertyUnitController extends Controller
{
    //
    public function getPropertyUnits()
    {

        $propertyunits = Propertyunits::with(['propertyDetails','propertyDetails.location', 'propertyDetails.amenities' , 'propertyDetails.propertyImages'])->get();
        return CommonResource::collection($propertyunits);
            
       
    }

    public function showPropertyunit($id)
    {
        $property_units = propertyunits::with(['propertyDetails','propertyDetails.location', 'propertyDetails.amenities' , 'propertyDetails.propertyImages'])->where('id', $id)->get();

        return  CommonResource::collection($property_units);
    }
    public function storePropertyUnit(PropertyUnitsRequest $request)
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
            return $this->returnSuccess("Property Unit");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
