<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommonResource;
use App\Models\attempt;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function getleads()
    {
        $lead = Lead::get();

        return  CommonResource::collection($lead);
    }
    public function showlead($id)
    {
        $with = [];
        if(request()->has('attempt')){
            $attempt = request()->attempt;
            if($attempt == 'true'){
                $with[] = 'getAttempts';
            }
        }
        $lead = Lead::with($with)->where('id', $id)->get();

        return  CommonResource::collection($lead);
    }
    public function storeAgent(Request $request)
    {
        try {
            DB::beginTransaction();
            $lead = new lead;
            $lead->client_name = $request->client_name;
            $lead->client_contact = $request->client_contact;
            $lead->client_mail = $request->client_mail;
            $lead->clinet_location = $request->clinet_location;
            $lead->propertytype_id = $request->propertytype_id;
            $lead->source_id = $request->source_id;
            $lead->status = $request->status;
            $lead->remark = $request->remark;
            $lead->user_id = $request->user()->id;
            $lead->save();
            DB::commit();
            return [
                'success'   => true,
                'message'   => "Agent Added Successfully",
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'success'   => false,
                'message'   => $th->getMessage(),
            ];
        }
    }
    public function getAttempt($id)
    {
        $lead = attempt::where('id', $id)->get();

        return  CommonResource::collection($lead);
    }
}
