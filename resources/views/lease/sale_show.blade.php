<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        {{-- saad --}}

        <div class="container ">
            <div class="row">
                <div class="col-md-12  ">
                    <div class="mt-7 col-12  ">
                    </div>
                    <div class=" row ml-4 mr-4">
                        <div class="col-8">
                            <h4>
                                Booking Details
                            </h4>

                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="/lease/sale/index" class="btn btn-lg btn-secondary " type="submit">Back Sale Lease</a>
                        </div>


                    </div>


                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="card-title "> Property  :</h5>{{$data->name}}

                        </div>
                        <div class="col">
                            <h5 class="card-text">Customer Name :</h5>
                            {{ $data->first_name}}
                        </div>


                        <div class="col">
                            <h5 class="card-text">Price:</h5>
                            {{ $data->total_sale_price}}
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col">
                            <h5 class="card-title ">Advance Payment :</h5>
                            {{ $data->sale_advance_payment}}
                        </div>
                        <div class="col">
                            <h5 class="card-text">Paid Payment:</h5>
                            {{ $data->paid_payment}}
                        </div>
                        <div class="col">
                            <h5 class="card-text">Remaning Payment :</h5>
                            {{ $data->remaing_payment}}
                        </div>
                    </div>

                    <div class="row mt-6">

                        <div class="col">
                            <h5 class="card-text">Due Date:</h5>
                            {{ $data->due_date}}
                        </div>
                        <div class="col">
                            <h5 class="card-title ">Created Date :</h5>

                            {{date('F d, Y', strtotime($data->created_at))}}
                        </div>
                    </div>

                    <div class="row mt-6">

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



    </main>
    </x-layouts.base>
    {{-- @include('layouts.footers.auth') --}}

    @section('page-script')
    <script src="{{ asset('assets') }}/js/lease.js"></script>
    @endsection
