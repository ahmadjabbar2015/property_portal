<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
    {{-- @dd($propertyunits); --}}
    {{-- saad --}}
    <div class="container">
        <form method="POST" action="{{ url('propertyunits/store') }}" enctype="multipart/form-data" id="regiester_propertyunit">
            @csrf
            <div class="row">
                <div class=" mt-6 ml-4">
                    <h1>
                        Add Property Units
                    </h1>
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                    <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-2 ml-2">
                        <h4>
                            Add Property Details
                        </h4>
                        <div class="row">
                            <div class="col">
                                <label for="Fname"> Select Main Property * </label>
                                <select class="form-select form-control" aria-label="" name="property_id">
                                <option selected disabled>Choose an Option</option>
                                    @foreach ($property as $propertydata)
                                        <option id="Units" value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                        </option>
                                    @endforeach

                                </select> 

                            </div>
                            <div class="col">
                                <label for="email">Property Units Title *</label>
                                <input type="text" class="form-control" placeholder="" name="title">

                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Fname"> Commission * </label>
                                <input type="number" class="form-control" placeholder="" name="commission">
                                </select>
                            </div>
                          
                        
                        </div>
                        <div class="col mt-5">
                            <label for="email">Details *</label>
                            <input type="text" class="form-control" placeholder="e.g two bedroom,studio ,villa"
                                name="details">

                        </div><br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description /Features*</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Room features and description"
                                rows="3" name="description"></textarea>
                        </div><br>
                        <div class="col">
                            <label for="file">Upload Room Image </label>
                            <input type="file" class="form-control" id="" name="image">
                        </div><br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-lg btn-primary me-md-2" type="submit">Create Room Units</button>
                        </div>
                    </div>
                </div>
        </form>
        
          
        </div>
    </div>
    </div>
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/propertyunits.js"></script>
@endsection
