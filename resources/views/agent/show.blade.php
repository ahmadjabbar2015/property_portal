@extends('layouts.master')
@section('title' , 'Show Agent')
@section('main')

        <div class="container">
            <div class="row mb-3" style="text-align: center;">
                <div class="col-md-12 mt-4 ml-4 ">
                    <h1>Agent Details</h1>
                </div>
            </div>
             
<div class="row mb-5">
                    <div class="col">
                     
                      <h2 style="display: inline-block;">
                        ABOUT ME:
                    </h2>
             </div>
             <div class="col">

                    
                        <button type="submit" class="btn btn-success"><a href="{{ url('/agent/edit/' . $agent->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/agent/delete/' . $agent->id) }}">
                                Delete </a></button>
                            </div>


                                
                    
</div>
                    
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title "> Name :<h5>
                                    <p> {{ $agent->name }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Email :<h5>
                                    <p> {{ $agent->email }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Phone Number :</h5>
                                <p> {{ $agent->number }} </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Adrees : </h5>
                               <p> {{ $agent->address }}</p>
                        </div>
                    </div>

                </div>
                <div>
           
            </div>
@endsection
