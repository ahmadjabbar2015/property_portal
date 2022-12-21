<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SourceController extends Controller
{
    public function index()
    {
        $source = source::paginate(10);
        return CommonResource::collection($source);
    }

    public function show($id)
    {
        $source = source::where('id' , $id)->get();
        return CommonResource::collection($source);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all() , [
            'source' => 'required|unique:sources|max:255'
        ]);

        if($validate->fails()){
            return [
                'success' => false,
                'data' => $validate->errors()
            ];
        }

        try {
            DB::beginTransaction();
                source::create([
                    'source' => $request->source
                ]);
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Source Added Successfully",
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
