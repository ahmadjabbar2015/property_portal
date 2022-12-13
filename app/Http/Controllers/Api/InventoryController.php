<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommonResource;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use Exception;

class inventoryController extends Controller
{
    //
    public function getInventories()
    {
        $inventory = Inventory::get();

        return  CommonResource::collection($inventory);
    }
    public function showInventory($id)
    {
        $inventory = Inventory::where('id', $id)->get();

        return  CommonResource::collection($inventory);
    }
    public function storeInventory(Request $request)
    {
        try {
            DB::beginTransaction();
                $inventory = new Inventory;
                $inventory->property_id = $request->property_id;
                $inventory->propertyunit_id = $request->propertyunit_id;
                $inventory->description = $request->description;
                $inventory->image = $request->image;
        
                if ($request->hasfile('image')) {
        
        
                    $file = $request->file('image');
                    $extention = $file->getClientoriginalExtension();
                    $filename = time() . '.' . $extention;
        
                    $data = $file->move(public_path('/assets/img'), $filename);
                    $inventory->image = $filename;
                }
        
                $inventory->unit = $request->unit;
         
                $inventory->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Inventory Added Successfully",
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
