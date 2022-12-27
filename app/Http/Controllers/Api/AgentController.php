<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Http\Resources\CommonResource;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    //
    public function getAgents()
    {
 
        $bussniess_id=auth()->user()->bussniess_id;
        $agent =Agent::where('bussniess_id',$bussniess_id)->paginate(10);
        return  CommonResource::collection($agent);
    }
    public function showAgent($id)
    {
        
        $bussniess_id=auth()->user()->bussniess_id;

        $agent = Agent::where('id', $id)
      ->where('bussniess_id',$bussniess_id)->get();

        return  CommonResource::collection($agent);
    }
    public function storeAgent(AgentRequest $request)
    {
        try {
            DB::beginTransaction();
            $bussniess_id=auth()->user()->bussniess_id;
                $agent = new Agent;
                $agent->name = $request->name;
                $agent->email = $request->email;
                $agent->number = $request->number;
                $agent->address = $request->address;
                $agent->bussniess_id=$bussniess_id;
                
                $agent->save();
            DB::commit();
            return $this->returnSuccess("Agent");

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
      
    }

    
}
