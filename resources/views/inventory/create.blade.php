<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
    {{-- saad --}}

    <div class="container">
        <form method="POST" action="/inventory/store" enctype="multipart/form-data" id="regiester_inventory">
            @csrf
            <div class="row">
                <div class=" mt-6 ml-4">
                    <h1>
                        Create Inventory
                    </h1>
                </div>
            </div><br>

            <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                <div class="row">
                    <div class="col-md-10">
                        <h4>
                            Property Inventory
                        </h4>
                        <p>For property unit inventory creation, check the box on the right corner.</p><br>
                    </div>
                    <div class="col-md-2" id="inventor_for">
                        <label>Inventory For:</label>
                        <select class="form-select form-control select2 " aria-label=""
                            name="unit">
                            <!-- <option value="property" selected >Property</option>
                          
                            <option value="property_unit"  selected >Property Units</option> -->
                  
                            <option value="null">Property</option>
                            <option value="UNIT" name="unit" >Property_unit</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <label>Select Main Property *</label>
                        <select class="form-select form-control select2 " aria-label="Default select example"
                            name="property_id">
                            <option selected disabled>Choose an Option</option>
                                    @foreach ($property_details as $propertydata)
                                        <option id="Units" value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                        </option>
                                    @endforeach


                        </select>
                    </div>
                    <div class="col" id="property_units_show">
                        <label> Property Units</label>
                        <select class="form-select form-control select2 "  aria-label="Default select example"
                            name="propertyunit_id">
                            <option selected disabled>Choose an Option</option>
                          @foreach ($propertyunits as $item)
                                        <option value="{{ $item->id }}" >{{ $item->title }}</option>
                                    @endforeach
                        </select>

                    </div>
                </div><br>
             
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description *</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                     
                    </div><br>
             
                    <div class="form-group">
                        <label for="image">Upload Room Image</label>
                        <input type="file" class="form-control" id="" name="image">
                    </div><br>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-lg btn-primary me-md-2" type="submit">Create Inventory</button>
                    </div>
            </div>
        </form>
    </div>

</main>

</x-layouts.base>
    {{-- @include('layouts.footers.auth') --}}

@section('page-script')
<script src="{{ asset('assets') }}/js/inventory.js"></script>
@endsection
