<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommonResource;
use App\Http\Requests\InventoryRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use Exception;

class inventoryController extends Controller
{
    //
    public function getInventories()
    {
        $inventory = Inventory::with(['propertyDetails','propertyUnits.propertyDetails','propertyUnits.propertyDetails.location' , 'propertyUnits.propertyDetails.amenities' , 'propertyUnits.propertyDetails.propertyImages'])->paginate(10);
        return CommonResource::collection($inventory);
    }
    public function showInventory($id)
    {
        $inventory = Inventory::where('id', $id)->get();

        return  CommonResource::collection($inventory);
    }
    public function storeInventory(InventoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $inventory = new Inventory;
            $inventory->property_id = $request->property_id;
            $inventory->propertyunit_id  = $request->propertyunit_id ;
            $inventory->description = $request->description;
            $inventory->image = $request->image;
            $inventory->unit = $request->unit;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;
                $inventory = $file->move(public_path('/assets/img'), $filename);
                $inventory->image = $filename;
            }    

            $inventory->save();
            DB::commit();
            return $this->returnSuccess("Inventory");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
