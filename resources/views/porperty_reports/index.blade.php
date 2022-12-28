@extends('layouts.master')
@section('title' , 'Property Reports')
@section('view_proReport' , 'active')
@section('main')       

        <div class="container">

            <h1>
                Property Reports
            </h1>
            <div>
                <button class="btn btn btn-danger mt-4 ml-3 mb-3" onclick="myFunction()"><i class="fa-solid fa-filter"></i>
                    Filters
                </button>
            </div>
            <div id="filter_id" class="shadow bg-light filter_id">
                <div class="row mt-3 px-3">
                    <div class="col-md-3 mt-3" >
                        <label>Property</label>
                        <select class="form-control property_id" placeholder="Property" id="search_property_id" >
                            <option value=""disabled selected >Select your option</option>
                            @foreach ($propertydetail as $propertydata)
                                <option  id="property_detial_id" 
                                value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>Landlord</label>
                        <select class="form-control " placeholder="Property" id="landlord_id">
                            <option value="" disabled selected>Select your option</option>
                            @foreach ($landlord as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->full_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    {{-- @dd($attempt) --}}
                    <div class="col-md-3 mt-3">
                        <label>Customer</label>
                        <select class="form-control " placeholder="Property" id="customer_id">
                            <option value="" disabled selected>Select your option</option>
                            @foreach ($customer as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->client_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label>Property Type</label>
                        <select class="form-control" placeholder="Property" id="type_id">
                            <option value="" disabled selected>Select your option</option>
                            @foreach ($propertytype as $propertydata)
                                <option value="{{ $propertydata->id }}">
                                    {{ $propertydata->type }}
                                </option>
                            @endforeach
                        </select>
                       </div>

                </div>
                <div class="row mt-3 px-3">
                    {{-- <div class="col-md-3 mb-3">
                        <label>Property Type</label>
                        <select class="form-control " placeholder="Property" id="type_id">
                            <option value="" disabled selected>Select your option</option>
                            @foreach ($propertytype as $propertydata)
                                <option value="{{ $propertydata->id }}">
                                    {{ $propertydata->type }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-3 mb-3">
                        <label>Date Range</label>
                        <input class="form-control form-control-solid date_range"  onchange="datepicker()" placeholder="Pick date rage"
                            id="kt_daterangepicker_4" name="date_range" value=""/>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable" id="propertyreports_table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col" class=""> ID</th> --}}
                                        <th scope="col" class=""> Property Name</th>
                                        <th scope="col" class="">Landlord Name</th>
                                        <th scope="col" class=""> Property Type</th>
                                        <th scope="col" class="">Property Unit</th>
                                        <th scope="col" class="">Customer</th>
                                        <th scope="col" class=""> Price</th>
                                        <th scope="col" class=""> Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<script>
    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    }

    $("#kt_daterangepicker_4").daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {

            "Today": [moment(), moment()],
            "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf(
                "month")],
            "This Year": [moment().startOf("year"), moment().endOf("year")]
        }

    }, cb);

    cb(start, end);

   
</script>


@section('page-script')
    <script src="{{ asset('assets') }}/js/property_reports.js"></script>
@endsection
