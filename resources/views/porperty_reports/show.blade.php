@extends('layouts.master')
@section('title' , 'Show Property Reports')

@section('main')       

        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-md-9 mt-3 shadow" style="text-align: center;">
                    <h3 class="mt-3 mb-4 ">
                        Property details ({{$propertydetail->created_at->format('d-m-Y')}})
                    </h3>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Property Name
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Rent/Sale
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->rent }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Property Type
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->type }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                landlord Name
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->full_name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Area
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->area }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Customer Name
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->client_name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="mb-3">
                                Property Unit
                            </h6>
                        </div>
                        <div class="col">
                            <h6> {{ $propertydetail->title }}</h6>
                        </div>
                        <hr>
            </div>

                    
            <div style="margin-right: -70%;">
                <button class="btn btn-primary" type="button" ><i class="fa fa-print" ></i>
                    Print</button>
                    <a href="/porperty_reports/index">
                        <button class="btn btn-danger" type="button">Close</button>
                    </a>
            </div>
            <p class="text-center mt-3">
                @ Cross Devlogix.Com
            </p>
        </div>


        </div>
 @endsection
