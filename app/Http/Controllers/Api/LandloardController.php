<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandlordRequest;
use App\Http\Resources\LandLordResource;
use App\Models\Landlord;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandloardController extends Controller
{
    public function index(){
      
        $bussniess_id=auth()->user()->bussniess_id;
        $landlords =landlord::where('bussniess_id',$bussniess_id)->paginate(10);
            return new LandLordResource($landlords);
    }

    public function show($id){
        $bussniess_id=auth()->user()->bussniess_id;
        $landlord = landlord::where('id' , $id)
        ->where('bussniess_id',$bussniess_id)->get();
        return new LandLordResource($landlord);
    }

    public function store(LandlordRequest $request){

       try{
            DB::beginTransaction();
            $bussniess_id=auth()->user()->bussniess_id;
            $landlord=new landlord;
            $landlord->full_name=$request->full_name;
            $landlord->email=$request->email;
            $landlord->number=$request->number;
            $landlord->identity=$request->identity;
            $landlord->address=$request->address;
            $landlord->occupation=$request->occupation;
            $landlord->bussniess_id=$bussniess_id;
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
