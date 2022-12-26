@extends('layouts.master')
@section('title' , 'Add Tenant')
@section('add_tenant' , 'active')
@section('main')

        <div class="container">
            <form method="POST" action="{{ url('tenant/store') }}" enctype="multipart/form-data" id="regiester_tenants">
                @csrf

                <div class="row" style="margin-top: -83px;">
                    <div class="col-md-12 mt-6 ml-4 col-xs-12">
                        <h1>
                            Tenants
                        </h1>
                    </div>
                </div>

                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                    <h4>
                        Register New Tennat
                    </h4>
                    <div class="row mt-2">
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label for="Fname">Full name :*</label>
                            <input type="text" class="form-control" placeholder="Full name" name="full_name">

                        </div>

                        <div class="col-md-6 col-xs-1 mb-2">
                            <label for="email">Email :*</label>
                            <input type="email" class="form-control" placeholder="email" name="email">

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Phone Number :*</label>
                            <input type="text" class="form-control" placeholder="12321" name="number">

                        </div>

                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Identity No/Passport</label>
                            <input type="text" class="form-control" placeholder="123321" name="identity">
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label for="file">Identifcation Docoument</label>
                            <input type="file" class="form-control" id="" name="image">

                        </div>
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Address :*</label>
                            <input type="text" class="form-control" placeholder="address" name="address">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-xs-12 py-2">
                            <div class="progress" style="height: 50px;">

                        <h4> <i class="fa fa-bookmark"></i> PLACE OF WORK</h4>
                    </div>
                        </div>
                    </div>

                   


                    <div class="row ">
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Occupation Status</label>
                            <select class="form-select form-control select2 " aria-label="Default select example"
                                name="occupation">
                                <option value="">Chosse</option>
                                <option value="Employee">Employee</option>
                                <option value="Employer">Employer</option>
                                <option value="Employer">Self Employer</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Occupation Place</label>
                            <input type="text" class="form-control" placeholder="" name="place">
                        </div>
                    </div>


                <div class="row">
                    <div class="col-md-12 col-xs-12 mb-2">

                <div class="progress" style="height: 50px;">

                        <h4 class=""> <i class="fa fa-bookmark"></i> INCASE OF EMERGENCY CONTACT</h4>
                </div>

                    </div>
                </div>
                    
                    <div class="row">
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                        </div>
                        <div class="col-md-6 col-xs-1 mb-2">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" placeholder="" name="phone">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg ml-3">Register Tenant</button>
 </div>
            </form>

        </div>


        @endsection



    @section('page-script')
        <script src="{{ asset('assets') }}/js/tenants.js"></script>
    @endsection
