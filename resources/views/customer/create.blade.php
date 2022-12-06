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
                                Customer Form
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" action="/customer/store ">
                @csrf
                <div class="  mr-2 ml-2 mt-2">
                    <h4 class="">
                        Add Customer
                    </h4>
                    <p></p>
                    {{-- @dd($leads) --}}
                    <div class="">
                        <label for=""> Customer Name</label>

                        <select type="text" class="form-control" placeholder="" name="leads_id" readonly >
                            <option selected value="{{ $leads->id}}" >{{ $leads->client_name}}</option>
                            

                        </select>

                    </div>
                    <div class="row ml-2 mr-2 mt-4">
                        <div class="col">
                            <label for="">Agent Name:</label>
                            <select type="text" class="form-control"  name="agent_id">
                
                                <option selected disabled>Choose an Option</option>
                                @foreach ($agents as $item)
                                    <option value="{{ $item->id }}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Property:*</label>
                            <select type="text" class="form-control" name="property_id"
                                id="property" >
                                <option selected disabled>Choose an Option</option>
                                @foreach ($propertydetails as $property)
                                    <option   data-rent={{ $property->rent }} value="{{ $property->id }}">{{ $property->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row ml-2 mr-2 mt-4">
                        <div class="col">
                            <label for="Fname">Property Price</label>
                            <input type="number" class="form-control" placeholder="" name="property_price"
                                >
                        </div>


                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleFormControlTextarea1">Description *</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>

                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-lg btn-primary me-md-2" type="submit">Submit Customer</button>
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
