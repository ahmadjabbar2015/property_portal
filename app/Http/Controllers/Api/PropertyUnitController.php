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
        $bussniess_id=auth()->user()->bussniess_id;
        $propertyunits = Propertyunits::with(['propertyDetails','propertyDetails.location', 'propertyDetails.amenities' , 'propertyDetails.propertyImages'])
        ->where('bussniess_id',$bussniess_id)->paginate(10);
        return CommonResource::collection($propertyunits);
            
       
    }

    public function showPropertyunit($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $property_units = propertyunits::with(['propertyDetails','propertyDetails.location', 'propertyDetails.amenities' , 'propertyDetails.propertyImages'])->where('id', $id)
        ->where('bussniess_id',$bussniess_id)->get();

        return  CommonResource::collection($property_units);
    }
    public function storePropertyUnit(PropertyUnitsRequest $request)
    {
        try {
            DB::beginTransaction();
            $bussniess_id=auth()->user()->bussniess_id;
                $propertyunit = new propertyunits;
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
            DB::commit();
            return $this->returnSuccess("Property Unit");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
