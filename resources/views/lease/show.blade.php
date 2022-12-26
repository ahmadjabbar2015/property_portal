@extends('layouts.master')
@section('title' , 'Show Rent Lease')
@section('main')

    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                        <h4>Lease Rent Details</h4>
            </div>
                    <div class="col-md-6 mb-4">
                        <a href="/lease/index" class="btn btn-secondary">Back Sale Lease</a>
                    </div>
        </div>
                <div class="row">
                    <div class="col">
                        <h5 class="card-title "> Property  :</h5>{{$data->name}}

                    </div>
                    <div class="col">
                        <h5 class="card-text">Teanat Name :</h5>
                        {{ $data->full_name}}
                    </div>


                    <div class="col">
                        <h5 class="card-text">Rent:</h5>
                        {{ $data->rent}}
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title ">Advance Payment :</h5>
                        {{ $data->advance_payments}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Paid Payment:</h5>
                        {{ $data->paid_payment}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Payment Collection :</h5>
                        {{ $data->frequency_collection}}
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title "> Laese Start Date:</h5>
                        {{ $data->lease_start}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Laese End Date:</h5>
                        {{ $data->lease_end}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Due Date:</h5>
                        {{ $data->due_date}}
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title ">Created Date :</h5>

                        {{date('F d, Y', strtotime($data->created_at))}}
                    </div>
                    <div class="col">
                        <h5 class="card-title "> Terms:</h5>
                        {{ $data->terms}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Image:</h5>
                        @if ($data->image == null)
                        <img src="{{asset('/assets/img/alt.png')}}" alt="No-document" height="200"
                        width="200">
                        @else
                        <img src="{{asset('/assets/img/'.$data->image)}}" alt="No-document" height="200"
                        width="200">
                        @endif


                    </div>


                </div>


     </div>
    </div>
 </div>


 @endsection


@section('page-script')
<script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
