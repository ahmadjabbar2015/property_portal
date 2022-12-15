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
        $inventory = Inventory::with(['propertydetail','propertydetail.location' , 'propertydetail.amenities' , 'propertydetail.propertyImages','propertyunits'])->get();
        // dd($inventory);
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
            $inventory->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Inventory Added Successfully",
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success'   => false,
                'message'   => $e->getMessage(),
            ];
        }
    }
}
