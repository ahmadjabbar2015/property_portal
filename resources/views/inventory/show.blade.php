@extends('layouts.master')
@section('title' , 'Show Inventory')
@section('main')

    <div class="container">
        <div class="row mb-4">
           
            <div class=" col-md-7 mt-4 ml-4">
                <h1>
                    Show Inventory
                </h1>
            </div>
            <div class="col-md-5 mt-3 ">
                <a class="btn btn-secondary me-md-2 ml-8" type="submit" href="/inventory/index">Back To Inventory </a>
            </div>

        </div>
        @foreach ($data as $data)
            <div class="row ml-3 mb-3">
                <div class="col">
                    <h5 class="card-title "> Inventory For</h5>
                    <p>{{ $data->name }}</p>
                </div>
                <div class="col">
                    <h5 class="card-title ">Type</h5>
                    <p>
                         {{ $data->unit }}

                    </p>
                </div>
            </div>

            <div class="row">

            <div class="col ml-3">
                <h5 class="card-title "> Description</h5>
                <p>
                    {{ $data->description }}
                </p>
            </div>
            <div class="col ml-3 mb-8">
                <h5 class="card-title ">image</h5>
                @if ($data->image == null)
                <img src="{{asset('assets/img/no-image.png')}}" alt="image" height="200" width="200">
                @else
                <img src="{{asset('assets/img/'. $data->image)}}" alt="image" height="200" width="200">
                @endif
                    
            </div>
        </div>
        
        @endforeach


    </div>

    @endsection

    @section('page-script')
<script src="{{ asset('assets') }}/js/inventory.js"></script>
@endsection


