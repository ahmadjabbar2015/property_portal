<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')

    {{-- saad --}}
    @foreach ($saledata as $item)
    <div class="container ">
        <div class="row">
            <div class="col-md-12  ">
                <div class="mt-7 col-12  ">
                </div>
                <div class=" row ml-4 mr-4">
                    <div class="col-8">
                        <h4>
                            Lease Details
                        </h4>

                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <a href="/lease/sale/index" class="btn btn-lg btn-secondary " type="submit"><-Back Sale Lease</a>
                    </div>


                </div>


                <div class="row mt-3">
                    <div class="col">
                        <h5 class="card-title "> Property  :</h5>{{ $item["property"]['name']}}

                    </div>
                    <div class="col">
                        <h5 class="card-text">Customer Name :</h5>
                        {{ $item->customer_id}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Property Unit :</h5>
                        {{ $item["propertyUnits"]['title']}}
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title "> Sale Price  :</h5>
                        {{ $item->total_sale_price}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Remaning Payment:</h5>
                        {{ $item->remaing_payment}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Installment Plane :</h5>
                        {{ $item->frequency_collection}}
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title "> No. of Years/Month:</h5>
                        {{ $item->number_of_years_month}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Payment Per Month/Year:</h5>
                        {{ $item->payment_per_frequency}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Advance payments :</h5>
                        {{ $item->sale_advance_payment}}
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title ">Leases Start:</h5>
                        {{ $item->lease_start}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Lases End:</h5>
                        {{ $item->lease_end}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">First Due Date :</h5>
                        {{ $item->due_date}}
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col">
                        <h5 class="card-title "> Terms:</h5>
                        {{ $item->terms}}
                    </div>
                    <div class="col">
                        <h5 class="card-text">Image:</h5>
                        {{ $item->image}}
                    </div>


                </div>


     </div>
    </div>
 </div>
    @endforeach


</main>
</x-layouts.base>
{{-- @include('layouts.footers.auth') --}}

@section('page-script')
<script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
