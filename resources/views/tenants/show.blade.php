@extends('layouts.master')
@section('title' , 'Show Tenant')
@section('main')

        <a href="{{url('/tenants/index')}}"><button type="button" class="btn btn-primary"> Back Tenants</button></a>
        <div class="container">

            <div class="row text-center" style="margin-top: -62px;">
                <div class="mt-6 ml-4">
                    <h1>
                        Tenants Details
                    </h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4 col-md-10 ">
                    <div class="text-end">


                        <button type="submit" class="btn btn-success"><a
                                href="{{ url('/tenants/edit/' . $tenants->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/tenants/delete/' . $tenants->id) }}">
                                Delete </a></button>
                    </div>
                    <h2>
                        ABOUT ME:
                    </h2>
                    <div class="row">
                        <div class="col col-xs-3">
                            <h5 class="card-title"> Name:</h5>
                            <p> {{ $tenants->full_name }}</p>
                        </div>

                        <div class="col col-xs-9">
                            <h5 class="card-text">Email:</h5>
                            <p> {{ $tenants->email }}</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col col-xs-6">
                            <h5 class="card-text">Phone Number:</h5>
                            <p> {{ $tenants->number }}</p>
                        </div>
 <div class="col col-xs-6">
                            <h5 class="card-text">Identity No:</h5>
                            <p> {{ $tenants->identity }}</p>
                        </div>

                    </div>
                    <div class="row">
                       
                        <div class="col col-xs-6">

                            <h5 class="card-text">Adrees:</h5>
                            <p> {{ $tenants->address }}</p>
                        </div>
                        <div class="col col-xs-6">
                            <h5 class="card-text">Occupation:</h5>
                            <p> {{ $tenants->occupation }}</p>
                        </div>
                    </div>
                   
                        <div class="row">
                            <div class="col col-xs-6">
                                <h5 class="card-text">Occupation place:</h5>
                                <p>{{ $tenants->place }}</p>
                            </div>
                            <div class="col col-xs-6">

                                <h5 class="card-text">Docoument:<h5>
                                    @if ( $tenants->image == null)
                                 <img src="{{asset('assets/img/alt.png')}}" alt="No-document" height="200"
                                        width="200">
                                
                                    @else
                                 <img src="../../assets/img/{{ $tenants->image }}" alt="No-document" height="200"
                                        width="200">
                                
                                    @endif

                            </div>
                        </div>
                    
                </div>

            </div>

            @endsection
