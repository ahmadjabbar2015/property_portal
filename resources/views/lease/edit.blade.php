<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
    {{-- saad --}}

    <div class="container">
        <form action="{{ url('lease/update/'.$lease->id) }}" method="POST" enctype="multipart/form-data" id="regiester_leases">
            @csrf
            <div class="row">
                <div class=" mt-6 ml-4">
                    <h1>
                        Edit Lease
                    </h1>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-7">
                    <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                        <h4>
                            Create Lease
                        </h4>
                        <p>Complete all the required details</p><br>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="vehicle1"> Select Property *</label>
                                
                                <select class="form-select form-control" aria-label="" name="property_id">
                                <option selected value="{{$lease->property_id }}">{{ $lease->propertyname}}</option>
                                    @foreach ($property as $propertydata)
                                        <option id="Units" value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                        </option>
                                    @endforeach

                                </select> 
                            </div>
                           
                            <div class="col" id="div1"><br>

                                <input type="checkbox" id="vehicle1" name="unit" value="UNIT" {{$lease->unit=="UNIT"?"checked":''}}>
                                <label for="vehicle1"> Lease Units</label>
                            </div>
                            
                        </div> <br>
                        <div class="col-md-6" >
                            <div>
                                <label for="vehicle1"> Property Units</label>
                                <select class="form-select form-control" aria-label="" name="propertyunit_id" id="property_unit">
                                    <option selected value="{{$lease->propertyunit_id}}">{{$lease->title}}</option>
                                    @foreach ($propertyunits as $item)
                                        <option id="Units" data-deposit={{ $item->deposit }}
                                            data-rent={{ $item->rent }} value="{{ $item->id }}">{{ $item->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div><br>

                       
                        <div class="row">
                            <div class="col-md-6">
                                <label>Rent *</label>
                                <div class="input-group mb-3 text-center">

                                    <span class="input-group-text bg-#918b8a" id="basic-addon1">$</span>

                                    <input type="number" class="form-control" id="rent" placeholder="" name="rent" value="{{$lease->rent}}">
                                </div>

                            </div><br>
                            <div class="col-md-6">
                                <label>Deposit Paid *</label>
                                <div class="input-group mb-3 text-center">

                                    <span class="input-group-text bg-#918b8a" id="deposit">$</span>

                                    <input type="number" class="form-control" placeholder="" name="deposit" value="{{ $lease->deposit}}">


                                </div>
                            </div>
                        </div><br>
                       
                        <div class="row">
                            <div class="col">

                                <label for="vehicle1"> Select Tenants *</label>
                                <select class="form-select form-control" aria-label="" name="tenant_id" id="tenant">
                                    <option selected value="{{$lease->tenant_id}}">{{$lease->full_name}}</option>
                                    @foreach ($tenants as $item)
                                        <option id="Units" data-id={{ $item->id }} value="{{ $item->id }}">
                                            {{ $item->full_name }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col">
                                <label for="vehicle1"> Tenants ID</label>
                                <input type="" class="form-control" placeholder="" name="new_teanants_id" value="{{$lease->new_teanants_id}}">
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="vehicle1"> Lease Start Date *</label>
                                <input type="date" class="form-control" placeholder="" name="lease_start" value="{{$lease->lease_start}}">
                            </div>
                            <div class="col">
                                <label for="vehicle1"> Lease End Date *</label>
                                <input type="date" class="form-control" placeholder="" name="lease_end" value="{{$lease->lease_end}}">
                            </div>
                        </div><br>
                        
                        <div class="col">
                            <label for="file">Upload Lesae Docuuments</label>
                            <input type="file" class="form-control" id="" name="image" >
                            <img src="../../assets/img/{{ $lease->image }}" alt="No-document" height="200" width="200"> 

                        </div><br><br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tenants Terms: </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="terms" value="{{$lease->terms}}">{{$lease->terms}}</textarea>
                        </div><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-lg btn-primary me-md-2" type="submit">Update Lease</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                        <h4>
                            Bills
                        </h4>
                        <p>
                            Include/Exclude bills when generating invoice
                        </p>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col">
                                           

                                            <label for="gas"> Gas</label><br>
                                        </div>
                                        <div class="col-md-2">
                                    <input type="number" class="" placeholder="Amount"  value="{{$lease->gasbill_amount}}"
                                        name="gasbill_amount" >
                                </div>
                                    </div>
                                </div>
                               
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5">
                                            

                                            Electricity
                                        </div>
                                        <div class="col-md-3">
                                    <input type="number" class="" placeholder="Amount"  value="{{$lease->electricitybill_amount}}"
                                        name="electricitybill_amount" >
                                </div>
                                    </div>
                                </div>
                                
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col">
                                            
                                        

                                            <label for="internet"> Internet</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="" placeholder="Amount" id="internet_amount" value="{{$lease->internetbill_amount}}"
                                        name="internetbill_amount" >
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col ml-3">
                                      
                                    

                                        <label for="tax"> Tax</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="" placeholder="Amount"  value="{{$lease->taxbill_amount}}"
                                            name="taxbill_amount" >
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</main>

</x-layouts.base>
    {{-- @include('layouts.footers.auth') --}}

@section('page-script')
<script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
