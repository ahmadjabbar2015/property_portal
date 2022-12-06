<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        {{-- saad --}}

        <div class="container">
            <div class="">
                <h1>Please Select the Lease Type</h1>
                <select class="form-select form-control main_div_select" aria-label="" id="main_div_lease">

                    <option selected value="rent_div">Rent</option>
                    <option value="sale_div">Sale</option>



                </select>
            </div>
            {{-- rent form --}}
            <div id="rent_div">
                <form action="lease/store" method="POST" id="regiester_leases">
                    @csrf
                    <input type="hidden" name="get_dmy" value="">
                    <div class="row mt-4 ">
                        <div class="col">
                            <div class="shadow lg-3 p-3 mb-5 bg-body rounded ">
                                <h4>
                                    Create Rent Lease
                                </h4>

                                <div class="row mt-4 col-md-12">
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Select Property *</label>

                                        <select class="form-select form-control" aria-label="" name="property_id"
                                            id="property_id">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($property as $propertydata)
                                                <option id="Units" data-id="{{ $propertydata->rent }}"
                                                    value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Property Units</label>
                                        <select class="form-select property_unit form-control" aria-label=""
                                            name="propertyunit_id" id="property_unit">



                                        </select>
                                    </div>

                                </div>



                                <div class="row mt-4 col-md-12">
                                    <div class="col-md-6">
                                        <label>Rent *</label>
                                        <div class="input-group mb-3 text-center">

                                            <span class="input-group-text bg-#918b8a" id="basic-addon1">Rs</span>

                                            <input type="number" class="form-control" id="rent" placeholder=""
                                                name="rent">
                                        </div>

                                    </div><br>
                                    <div class="col-md-6">
                                        <label>Advance Paid *</label>
                                        <div class="input-group mb-3 text-center">

                                            <span class="input-group-text bg-#918b8a" id="deposit">Rs</span>

                                            <input type="number" class="form-control" placeholder=""
                                                name="advance_payments">


                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 col-md-12">
                                    <div class="col">

                                        <label for="vehicle1"> Select Tenants *</label>
                                        <select class="form-select form-control" aria-label="" name="tenant_id"
                                            id="tenant">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($tenants as $item)
                                                <option id="Units" data-id={{ $item->id }}
                                                    value="{{ $item->id }}">
                                                    {{ $item->full_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col">
                                        <label for="vehicle1"> Tenants ID</label>
                                        <input type="" class="form-control" placeholder=""
                                            name="new_teanants_id">
                                    </div>

                                </div>
                                <div class="row mt-4 col-md-12" id="date_div">
                                    <div class="col">
                                        <label for="vehicle1"> Lease Start Date *</label>
                                        <input type="date" class="form-control" placeholder="" id="lease_start"
                                            name="lease_start">
                                    </div>
                                    <div class="col">
                                        <label for="vehicle1"> Lease End Date *</label>
                                        <input type="date" class="form-control" placeholder="" id="lease_end"
                                            name="lease_end">
                                    </div>
                                </div>
                                {{-- date  --}}
                                <div class="row mt-4 col-md-12">
                                    <div class="col">
                                        <label for="vehicle1">First Payment Due Date *</label>
                                        <input type="date" class="form-control" placeholder="" name="due_date">
                                    </div>
                                    <div class="col">
                                        <label for="vehicle1"> Collection Frequency*</label>
                                        <select class="form-select form-control " aria-label=""
                                            id="frequency_collection" name="frequency_collection">
                                            <option selected>Chosse An Option </option>
                                            <option value="monthly">Monthly</option>
                                            <option value="annually">Annually</option>
                                            <option value="daily">Daily</option>



                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="col" id="getpayments">
                                        <label for="vehicle1"> Payments *</label>
                                        <input type="number" class="form-control" placeholder=""
                                            name="total_payment">
                                    </div>
                                    <div class="col">
                                        <label for="file">Upload Lesae Docuuments</label>
                                        <input type="file" class="form-control" id="" name="image">
                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="col">
                                        <label for="exampleFormControlTextarea1">Tenants Terms: </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="terms"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-lg btn-primary me-md-2" type="submit">Finalize
                                            Lease</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            {{-- sale form --}}
            <div id="sale_div">
                <form action="lease/store/sale" method="POST" id="regiester_sale_leases">
                    @csrf

                    <div class="row mt-4 ">
                        <div class="col">
                            <div class="shadow lg-3 p-3 mb-5 bg-body rounded ">
                                <h4>
                                    Create Booking Leases
                                </h4>

                                <div class="row mt-4 col-md-12">
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Select Sale Property *</label>

                                        <select class="form-select form-control" aria-label="" name="property_id"
                                            id="propertysale_id">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($property as $propertydata)
                                                <option data-id="{{ $propertydata->rent }}"
                                                    value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Property Units</label>
                                        <select class="form-select property_sale_unit form-control" aria-label=""
                                            name="propertyunit_id" id="propertysale_unit">



                                        </select>
                                    </div>

                                </div>



                                <div class="row mt-4 col-md-12">
                                    <div class="col-md-6">
                                        <label>Total Price*</label>
                                        <div class="input-group mb-3 text-center">

                                            <span class="input-group-text bg-#918b8a" id="basic-addon1">Rs</span>

                                            <input type="number" class="form-control" id="total_sale_price"
                                                placeholder="" name="total_sale_price">
                                        </div>

                                    </div><br>
                                    <div class="col-md-6">
                                        <label>Advance Payment *</label>
                                        <div class="input-group mb-3 text-center">

                                            <span class="input-group-text bg-#918b8a">Rs</span>

                                            <input type="number" class="form-control" id="sale_advance_payment"
                                                placeholder="" name="sale_advance_payment">


                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 col-md-12">
                                    <div class="col">

                                        <label for="vehicle1"> Select Customer *</label>
                                        <select class="form-select form-control" aria-label="" name="customer_id"
                                            id="customer">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($customer as $item)
                                                <option data-id={{ $item->id }} value="{{ $item->id}}">
                                                    {{ $item->client_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col">
                                        <label for="vehicle1"> Remaning Payment</label>
                                        <input type="" class="form-control" id="remaing_payment"
                                            placeholder="" name="remaing_payment">
                                    </div>

                                </div>
                                <div class="row mt-4 col-md-12" id="date_sale_div">
                                    <div class="col">
                                        <label for="vehicle1"> Lease Start Date *</label>
                                        <input type="date" class="form-control" placeholder=""
                                            id="lease_sale_start" name="lease_start">
                                    </div>
                                    <div class="col">
                                        <label for=""> Lease End Date *</label>
                                        <input type="date" class="form-control" placeholder=""
                                            id="lease_sale_end" name="lease_end">
                                    </div>
                                </div>
                                {{-- date  --}}
                                <div class="row mt-4 col-md-12">
                                    <div class="col-md-6">
                                        <label for="">First Payment Due Date *</label>
                                        <input type="date" class="form-control" placeholder="" name="due_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Collection Frequency*</label>
                                        <div class="input-group">
                                            <select class="form-select form-control" aria-label=""
                                                id="frequency_sale_collection" name="frequency_collection">

                                                <option selected value="monthly">Monthly</option>
                                                <option value="annually">Annually</option>


                                            </select>
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text">
                                                    <input type="number" class="" placeholder="" value="0"
                                                        id="no_of_yearmonth" name="number_of_years_month">

                                                </span>
                                            </div>
                                        </div>








                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="col" id="">
                                        <label for="vehicle1">Payments Frquency*</label>
                                        <input type="number" class="form-control" placeholder=""
                                            id="payment_per_frequency" name="payment_per_frequency">
                                    </div>
                                    <div class="col">
                                        <label for="file">Upload Lesae Docuuments</label>
                                        <input type="file" class="form-control" id="" name="image">
                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="col">
                                        <label for="exampleFormControlTextarea1">Tenants Terms: </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="terms"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4 col-md-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-lg btn-primary me-md-2" type="submit">Finalize Sale
                                            Lease</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
    </main>
</x-layouts.base>
{{-- @include('layouts.footers.auth') --}}

@section('page-script')
    <script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
