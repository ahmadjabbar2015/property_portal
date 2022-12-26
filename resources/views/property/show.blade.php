@extends('layouts.master')
@section('title' , 'Show Property')
@section('main')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="ml-3">Property Details</h1>
            </div>
            <div class="col-md-4 ">
                <a class="btn btn-lg btn-secondary" href="/property/index">Back To Property</a>
            </div>
        </div>
        <div class="ml-5">
            <h4>
                Property  Here
            </h4>
        </div>

           <div class="container-fluid">
                 <div class="row bg-light">
                            <div class="col-md-4 col-xs-4">
                                <button id="overview" type="button" class="btn btn-outline btn-block">
                                    Overview
                                </button>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <button type="button" id="amenities"class="btn btn-outline  btn-block">
                                    Features & Amenities
                                </button>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <button type="button" id="gallery"class="btn  btn-outline  btn-block mb-5">
                                    Gallery
                                </button>
                            </div>
                 </div>
        

                        @foreach($data as $data)

            <div id="property_type">
                 <div class="row"> 
                    <div class="col-md-4">
                       <P class="card-title ml-5"> Property Type : <b>{{ $data->propertytype_name}} </b></P>
                    </div>
                    <div class="col-md-4">
                        <P class="card-title">Area : <b>{{ $data->area}}</b></p>
                    </div>
                    <div class="col-md-4">
                        <P class="card-title"> Status :<b>{{ $data->propertytype_name}} </b></p>
                    
                    </div>
                </div>
                <div class="row">
                   
                        <div class="col-md-4">
                            <P class="card-title ml-5"> Agency Commission :<b>${{ $data->agency}}</b> </p>

                        </div>
                        <div class="col-md-4">
                            <P class="card-title ">Rent : <b>${{ $data->rent}}</b> </p>

                        </div>
                        <div class="col-md-4">
                            <P class="card-title "> Deposit :<b>${{ $data->deposit}} </b></p>
                        </div>
                    
                </div>
                <div class="row">
                <div class="col-md-12">
                   
                        <h6 class="card-title "> Description :  </h6>
                        <p>{{ $data->description}}</p>
                    </div>
                </div>
            </div>
            </div>




        {{-- / Features --}}
        <div id="room" class="display:none col-12 mt-4 pb-4">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="card-title d-flex"> Rooms: </h6>
                   <p class="card-title d-flex"> <b>{{ $data->room}}</b></p>

                </div>
                <div class="col-md-3">
                    <h6 class="card-title d-flex ">Bedrooms :</h6>
                    <p class="card-title d-flex "> <b>{{ $data->bedroom}}</b></p>

                </div>
                <div class="col-md-3">
                    <h6 class="card-title d-flex"> bathrooms :</h6>
                    <p class="card-title d-flex"> <b>{{ $data->bathroom}}</b></p>

                </div>
                <div class="col-md-3">
                    <h6 class="card-title d-flex">Age : </h6>
                    <p class="card-title d-flex"><b>{{ $data->age}}</b></p>

                </div>
            </div>
            <div class="col-md-12 mt-4">
                <h5 class="card-title">Property Notes: </h5>
                <p class="ml-4">{{ $data->propertynote}}</p>
            </div>
            <div class="col-md-12">
                <h4 class="card-title"> Features:</h4>
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    $showdata= $data->animities;
                    $aminites=json_decode($showdata);
                    ?>
                    @if ($aminites !=null)
                    @foreach($aminites as $item)
                        <div col-md-4>
                                    <input class="form-check-input" type="checkbox" value="{{$item}}"  name="" id="dCheck" checked>
                                        <label class="form-check-label" for="defaultCheck1">
                                        {{$item}}
                                        </label>
                        </div>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- /Gallery --}}
<div id="galleryimg" class="display:none; col-md-12 mt-4 pb-4">
    <h1>Images</h1>
    @if ($data->propertyimage == null)
    <p> <img src="{{asset('/assets/img/alt.png')}}" alt="No-document" height="200"
        width="200">
</p>
    @else
        <p><img src="{{asset('/assets/img/'.$data->propertyimage)}}" alt="No-document" height="200" width="200"> </p>
    @endif

</div>
@endforeach
    </div>
    </div>


    @endsection
       
@section('page-script')

    <script src="{{ asset('assets') }}/js/property.js"></script>
@endsection
