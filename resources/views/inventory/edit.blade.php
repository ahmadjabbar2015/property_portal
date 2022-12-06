<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
      
        {{-- saad --}}
    
        <div class="container">
            <form action="{{ url('/inventory/update/' . $inventory->id) }}" method="POST"  id="" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class=" mt-6 ml-4">
                        <h1>
                            Update Inventory
                        </h1>
                    </div>
                </div><br>
    
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>
                                 Update Property Inventory
                            </h4>
                            <p>For property unit inventory creation, check the box on the right corner.</p><br>
                        </div>
                        <div class="col-md-2" id="inventor_for">
                            <label>Inventory For:</label>
                            <select class="form-select form-control select2 " aria-label=""
                                name="unit" value="{{ $inventory->unit }}">
                            
                      
                               
                                <option value="UNIT" name="unit"  value="{{ $inventory->unit }}">Property_unit</option>
                            </select>
                        </div>
                    </div>
    
    
                    <div class="row">
                        <div class="col">
                            <label>Select Main Property *</label>
                            <select class="form-select form-control select2 " aria-label="Default select example"
                                name="property_id">
                                 <option selected  value="{{ $inventory->property_id }}" >  {{ $inventory->name }}</option>
                                        @foreach($propertydetail as $item)
                                            <option id="Units" value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach 
     
    
                            </select>
                        </div>
                        <div class="col" id="property_units_show">
                            <label> Property Units</label>
                            <select class="form-select form-control select2 "  aria-label="Default select example"
                                name="propertyunit_id">
                                <option selected  value="{{ $inventory->propertyunit_id }}">{{ $inventory->title }}</option>
                              @foreach ($propertyunits as $item)
                                            <option value="{{ $item->id }}" >{{ $item->title }}</option>
                                        @endforeach
                            </select>
    
                        </div>
                    </div><br>
                 
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description *</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{ $inventory->description }}</textarea>
                         
                        </div><br>
                 
                        <div class="form-group">
                            <label for="image">Upload Room Image</label>
                           
                            <input type="file"  class="form-control" id=""  value="{{ $inventory->image }}" name="image" >
                            <img src="../../assets/img/{{ $inventory->image }}" alt="image" height="200" width="200">

                        </div><br>
    
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-lg btn-primary me-md-2" type="submit">Update Inventory</button>
                        </div>
                </div>
            </form>
        </div>
    
    </main>
    
    </x-layouts.base>
        {{-- @include('layouts.footers.auth') --}}
    