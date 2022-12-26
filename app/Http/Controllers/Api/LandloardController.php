<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandlordRequest;
use App\Http\Resources\LandLordResource;
use App\Http\Resources\TenantResource;
use App\Models\Landlord;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandloardController extends Controller
{
    public function index(){
        $landlords = landlord::paginate(10);
        
            return new LandLordResource($landlords);
    }

    public function show($id){
        $landlord = landlord::where('id' , $id)->get();
        return new LandLordResource($landlord);
    }

    public function store(LandlordRequest $request){

       try{
            DB::beginTransaction();
            $landlord=new landlord;
            $landlord->full_name=$request->full_name;
            $landlord->email=$request->email;
            $landlord->number=$request->number;
            $landlord->identity=$request->identity;
            $landlord->address=$request->address;
            $landlord->occupation=$request->occupation;
            $landlord->account=$request->account;

            if ($request->hasfile('image'))
                {
                            $file=$request->file('image');
                            $extention=$file->getClientoriginalExtension();
                            $filename=time().'.'.$extention;
                
                            $data=$file->move(public_path('/assets/img'),$filename);
                            $landlord->image=$filename;
                }
            $landlord->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Landlord Added Successfully",
            ];
       }catch(Exception $e){
        return [
            'success'   => false,
            'message'   => $e->getMessage(),
        ];
       }
    }
}
