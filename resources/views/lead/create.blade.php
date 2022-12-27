@extends('layouts.master')
@section('title' , 'Add Lead')
@section('add_lead' , 'active')
@section('main')
        <div class="container">
            <form method="POST" action="{{ url('lead/store') }}" enctype="" id="regiester_lead">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-4 ml-4">
                        <h1>
                            Leads
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            <h4>Add Leads</h4>

                    </div>
                </div>
                    
                            <div class="row mt-2 mb-2">
                                        <div class="col-md-6">
                                            <label for="">Phone Number :*</label>
                                            <input type="number" class="client_contact form-control"
                                                name="client_contact" value="" id="client_contact"
                                                onfocusout="myFunction()">
                                                 <span class="text-danger fst-italic" id="userError"> </span>
                                        </div>
                                <div class="col-md-6">
                                    <label for="">Client Name :* </label>
                                    <input type="text" class="form-control" placeholder="" name="client_name">
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for=""> Client Mail:
                                    </label>
                                    <input type="email" class="form-control" placeholder="" name="client_mail">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Client Location:</label>
                                    <input type="text" class="form-control" placeholder="" name="clinet_location">
                                </div>

                            </div>
                            
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Select Property Type :*</label>

                                        <select class="form-select form-control" aria-label="" name="propertytype_id">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($propertytype as $propertydata)
                                                <option value="{{ $propertydata->id }}">
                                                    {{ $propertydata->type }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6 ">

                                        <label for="vehicle1"> Select Source :*</label>

                                        <select class="form-select form-control" aria-label="" name="source_id">
                                            <option selected disabled>Choose an Option</option>


                                            @foreach ($source as $soursedata)
                                                <option value="{{ $soursedata->id }}">
                                                    {{ $soursedata->source }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                               
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Status :*</label>

                                        <select class="form-select form-control" aria-label="" name="status">
                                            <option selected disabled>Choose an Option</option>
                                            <option value="open">OPEN</option>
                                            <option value="close">CLOSE</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlTextarea1">Remarks: </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark"></textarea>
                                    </div>

                               
                                </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                <button class="btn btn-primary me-md-2" type="submit">Create Lead</button>
                            </div>
                    
            </form>
        </div>

            @endsection

@section('page-script')
    <script src="{{ asset('assets') }}/js/lead.js"></script>
@endsection
