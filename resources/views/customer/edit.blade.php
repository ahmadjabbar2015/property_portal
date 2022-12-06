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
                        <div class="col-10">
                            <h1>
                                Customer Form Update
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('/customer/update/' . $customer->id) }}" method="POST"  id="">
                {!! csrf_field() !!}
            <div class="  mr-2 ml-2 mt-2">
                <h4 class="">
                    Update Customer 
                </h4>
                <p></p>
                <div class="row mt-4">
                    {{-- <input type="hidden" class="form-control" placeholder="" name="customer_id" id=""> --}}
                    <div class="col">
                        <label for="Fname">Frist name :*</label>
                        <input type="text" class="form-control" placeholder="Frist name" name="first_name" id="name" value="{{ $customer->first_name }}">
                    </div>
                    <div class="col">
                        <label for="email">Last Name :*</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="email" value="{{ $customer->last_name }}">
                    </div>
    
                </div>
                <div class="row ml-2 mr-2 mt-4">
                    <div class="col">
                        <label for="email">Email :*</label>
                        <input type="email" class="form-control" placeholder="email" name="email" id="email" value="{{ $customer->email }}">
                    </div>
                    <div class="col">
                        <label for="Fname">Phone Number:*</label>
                        <input type="number" class="form-control" placeholder="Number" name="number" id="" value="{{ $customer->number }}">
                    </div>
                </div>
                <div class="col ml-2 mr-2 mt-4">
                    <label for="Fname">Address:*</label>
                    <input type="text" class="form-control" placeholder="Address" name="address" id="address" value="{{ $customer->address }}">
                </div>
                <div class="row ml-2 mr-2 mt-4">
                    <div class="col">
                        <label for="Fname">Agent Name:*</label>
                        <select type="text" class="form-control" placeholder="" name="agent_name" id="" >
                            <option selected  value="{{ $customer->agent_name }}">{{ $customer->name }}</option>
                            @foreach ($agents as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="Fname">Property</label>
                        <select type="text" class="form-control" placeholder="" name="property_id" id="" >
                            <option selected  value="{{ $customer->property_id }}">{{ $customer->property_name }}</option>
                            @foreach ($propertydetails as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach 
                        
                        </select>
                    </div>
                </div>
            
                <div class="row ml-2 mr-2 mt-4">
                    <div class="col">
                        <label for="Fname">Property Price</label>
                        <input type="number" class="form-control" placeholder="" name="deposit_cash" id="deposit_cash" value="{{ $customer->deposit_cash }}">
                    </div>
                    <div class="col">
                        <label for="Fname">Advance Cash</label>
                        <input type="number" class="form-control" placeholder="" name="advance_cash" id="advance_cash" value="{{ $customer->advance_cash }}">
                    </div>
                    <div class="col">
                        <label for="Fname"> Remaining Cash</label>
                        <input type="number" class="form-control" placeholder="" name="remaining_cash" id="remaining_cash" value="{{ $customer->remaining_cash }}">
                    </div>
    
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button class="btn btn-lg btn-primary me-md-2" type="submit">Update Customer</button>
                </div>
            </div>
        </form>
        </div>
        {{-- @include('layouts.footers.auth') --}}
    </main>
    </x-layouts.base>
    @section('page-script')
    <script src="{{ asset('assets') }}/js/customer.js"></script>
@endsection