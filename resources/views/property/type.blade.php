@extends('layouts.master')
@section('title' , 'Property Type')
@section('protype' , 'active')
@section('main')


    <div class="container">
        <form method="POST" action="{{ url('propertytype/store') }}" enctype="" id="regiester_propertytype">
            @csrf
            <div class="row">
                <div class=" mt-5 ml-4">
                    <h1>
                        Property Type
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow -lg-3 p-3 bg-body rounded mr-4 ml-4">


                      
                            <div class="col">
                                <label for="Fname">Type:*</label>
                                <input type="text" class="form-control" placeholder="" name="type" id="type" required>
                                <span id="type_id" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="col mb-3">
                                <label for="">Description</label>
                                <input type="textarea" class="form-control" placeholder=""
                                    rows="3"name="description">

                            </div>
                        

                        <button type="submit" class="btn btn-primary  ml-3">Register Type</button>
                    </div>
        </form>
    </div>


    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table mt-4 yajra-datatable" id="type_data">
                <thead>
                    <tr>
                        <th scope="col" class="">ID</th>
                        <th scope="col" class=""> Name</th>
                        <th scope="col" class=""> Description</th>
                        <th scope="col" class="">Actions</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    </div>
    @endsection

@section('page-script')
    <script src="{{ asset('assets') }}/js/propertytype.js"></script>
@endsection

{{-- @include('layouts.footers.auth') --}}
