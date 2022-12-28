@extends('layouts.master')
@section('title' , 'Show Property Unit')
@section('main')

        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                      <a href="/propertyunits/index">
                <button type="button" class="btn btn-primary">
                    BacK TO Units</button>
            </a>
                </div>
            </div>
          
    <div class="row">

                <div class="col-md-12">
                              <h1 style="display: inline-block">Units Details</h1>
                                <div style="float: right;">
                                @foreach ($propertyunits as $pu)
                               
                                <button type="submit" class="btn btn-success"><a
                                        href="{{ url('/propertyunits/edit/' . $pu->id) }}"> Edit</a></button>
                                <button type="submit" class="btn btn-danger"><a
                                        href="{{ url('/propertyunits/delete/' . $pu->id) }}"> Delete </a></button>
                                @endforeach
                            </div>

</div>
    </div>

    <div class="row">
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4 col-md-10">

                    <h2 class="text-center">
                        Property Units Details
                    </h2>
                    @foreach ($propertyunits as $pu)
                        <div class="row mt-4">
                            <div class="col">
                                <h5 class="card-title ">Select Main Property : </h5>
                                <p> {{ $pu->name }}</P>
                            </div>
                            <div class="col">
                                <h5 class="card-text"> Property Units Title:</h5>
                                <p>{{ $pu->title }}</p>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h5 class="card-text">Description :<h5>
                                        <p>{{ $pu->description }} </p>
                            </div>

                            <div class="col">
                                <h5 class="card-text">image:</h5>
                                @if ($pu->image == null)
                                <p> <img src="{{asset('/assets/img/alt.png')}}" alt="No-document" height="200"
                                    width="200">
                            </p>
                                @else
                                <p>
                                <img src="{{ asset('/assets/img/'.$pu->image) }}" alt="image" height="200"
                                width="200">
                            </p>
                                @endif

                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
@endsection
@section('page-script')
    <script src="{{ asset('assets') }}/js/propertyunits.js"></script>
@endsection
