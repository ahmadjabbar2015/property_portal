@extends('layouts.master')
@section('title' , 'Add Property Unit')
@section('add_proUnit' , 'active')
@section('main')


    <div class="container">
        <form method="POST" action="{{ url('propertyunits/store') }}" enctype="multipart/form-data" id="regiester_propertyunit">
            @csrf
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h1>
                        Add Property Units
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow p-3 bg-body rounded">
                        <h4>
                            Add Property Details
                        </h4>
            <div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <label for="Fname"> Select Main Property * </label>
                                <select class="form-select form-control" aria-label="" name="property_id">
                                <option selected disabled>Choose an Option</option>
                                    @foreach ($property as $propertydata)
                                        <option id="Units" value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="col-md-6 col-xs-6">
                                <label for="">Property Units Title *</label>
                                <input type="text" class="form-control" placeholder="" name="title">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description /Features*</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder=" features and description"
                                rows="3" name="description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="file">Upload Image </label>
                            <input type="file" class="form-control" id="" name="image">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button class="btn btn-lg btn-primary me-md-2" type="submit">Create Units</button>
                        </div>
                    </div>
                </div>
        </form>


        </div>
    </div>
    </div>
    @endsection

@section('page-script')
    <script src="{{ asset('assets') }}/js/propertyunits.js"></script>
@endsection
