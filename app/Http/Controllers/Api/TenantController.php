<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Http\Resources\TenantResource;
use App\Models\tenants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TenantController extends Controller
{
    public function index(){
        $tenants = tenants::all();
        return new TenantResource($tenants);
    }

    public function show($id){
        $tenant = tenants::where('id' , $id)->get();
        return new TenantResource($tenant);
    }

    public function store(TenantRequest $request){
        try{
            DB::beginTransaction();
            $tenants = new tenants;
            $tenants->full_name = $request->full_name;
            $tenants->email = $request->email;
            $tenants->number = $request->number;
            $tenants->identity = $request->identity;
            $tenants->address = $request->address;
            $tenants->occupation = $request->occupation;
            $tenants->place = $request->place;
            $tenants->emrgency_name = $request->emrgency_name;
            $tenants->emrgency_number = $request->emrgency_number;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;

                $file->move(public_path('/assets/img'), $filename);
                $tenants->image = $filename;
            }
            $tenants->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Tenant Added Successfully",
            ];
       }catch(Exception $e){
        return [
            'success'   => false,
            'message'   => $e->getMessage(),
        ];
       }
    }
}
