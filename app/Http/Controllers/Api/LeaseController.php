<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaseRequest;
use App\Http\Requests\SaleLeaseRequest;
use App\Http\Resources\CommonResource;
use App\Utils\LeaseUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaseController extends Controller
{
    protected $leaseUtil;
    public function __construct(LeaseUtil $leaseUtil){
        $this->leaseUtil = $leaseUtil;
    }
    public function index()
    {
        $data = $this->leaseUtil->getLeases();
        return CommonResource::collection($data);
    }

    public function show($id)
    {
        $data = $this->leaseUtil->getLeases($id);
        return $data;
        return CommonResource::collection($data);
    }

    public function store(LeaseRequest $request)
    {
        try {
            DB::beginTransaction();
                $this->leaseUtil->createLease($request);
            DB::commit();
            return $this->returnSuccess("Lease");
        } catch (\Throwable $th) {
            return $this->returnFalse($th->getMessage());
        }

    }

    public function storeSaleLease(SaleLeaseRequest $request)
  {
    try {
        DB::beginTransaction();

            $this->leaseUtil->storeSaleLease($request);
        
        DB::commit();
        return $this->returnSuccess("Sale");

    } catch (\Throwable $th) {
        DB::rollBack();
        return $this->returnFalse($th->getMessage());
    }
  }
}
