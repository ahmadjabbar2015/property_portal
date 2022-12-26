<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LeadRequest;
use App\Http\Requests\AttemptRequest;
use App\Http\Resources\CommonResource;
use App\Models\Attempt;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function getLeads()
    {
        $lead = Lead::paginate(10);

        return  CommonResource::collection($lead);
    }

    public function showLead($id)
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

    public function storeLead(LeadRequest $request)
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
            return $this->returnSuccess("Lead");
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
    
    public function getAttempt($id)
    {
        $lead = attempt::where('id', $id)->get();
        return  CommonResource::collection($lead);
    }

    public function storeAttempt(AttemptRequest $request )
    {
        try {
            DB::beginTransaction();
            $attempt = new attempt();
            $attempt->client_name = $request->client_name;
            $attempt->client_contact = $request->client_contact;
            $attempt->client_mail = $request->client_mail;
            $attempt->clinet_location = $request->clinet_location;
            $attempt->propertytype_id = $request->propertytype_id;
            $attempt->area_minimum = $request->area_minimum;
            $attempt->area_maximum = $request->area_maximum;
            $attempt->source_id = $request->source_id;
            $attempt->budget_minimum = $request->budget_minimum;
            $attempt->budget_maximum = $request->budget_maximum;
            $attempt->lead_status = $request->lead_status;
            $attempt->class_status = $request->class_status;
            $attempt->next_follow_date = $request->next_follow_date;
            $attempt->aad_remark = $request->aad_remark;
            $attempt->lead_id =$request->lead_id;
            $attempt->save();
            DB::commit();
            return $this->returnSuccess("Attempt");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->returnFalse($th->getMessage());
        }
    }
}
