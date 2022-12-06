
<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
    {{-- saad --}}

    <div class="container">

        
        <form action="{{ url('/tenants/update/' . $tenants->id) }}" method="POST" enctype="multipart/form-data" id="regiester_tenants">
            {!! csrf_field() !!}


            @csrf
            <div class="row">
                <div class=" mt-6 ml-4">
                    <h1>
                        Tenants
                    </h1>
                </div>
            </div>
            <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                <h4>
                    Register New Tennat
                </h4>
                <p>Tennat Tennats Creats Subtitle</p><br>
                <div class="row mt-2">
                    <div class="col">
                        <label for="Fname">Full name :*</label>
                        <input type="text" class="form-control" placeholder="Full name" name="full_name" id="full_name" value="{{ $tenants->full_name }}">

                    </div>
                    <div class="col">
                        <label for="email">Email :*</label>
                        <input type="email" class="form-control" placeholder="email" name="email" id="email" value="{{ $tenants->email }}">

                    </div>
                </div><br>
                <div class="row ">
                    <div class="col">
                        <label>Phone Number :*</label>
                        <input type="text" class="form-control" placeholder="12321" name="number" id="number" value="{{ $tenants->number }}">

                    </div>
                    <div class="col">
                        <label>Identity No/Passport</label>
                        <input type="text" class="form-control" placeholder="123321" name="identity" value="{{ $tenants->identity }}">
                    </div>
                </div><br>
                <div class="row ">
                    <div class="col">
                        <label for="file">Identifcation Docoument</label>
                        <input type="file" id="" name="image" value="{{ $tenants->image }}">
                        <img src="../../assets/img/{{ $tenants->image }}" alt="No-document"
                                    height="200" width="200">
                    </div>
                    <div class="col">
                        <label>Address :*</label>
                        <input type="text" class="form-control" placeholder="address" name="address" id="address" value="{{ $tenants->address }}">

                    </div>
                </div><br>
                <div class="progress" style="height: 50px;">

                    <h4 class="mt-3  ml-5"> <i class="fa fa-bookmark  "></i> PLACE OF WORK</h4>
                </div><br>
                <div class="row ">
                    <div class="col">
                        <label>Occupation</label>
                        <input type="text" class="form-control" placeholder="   Choose" name="occupation" value="{{ $tenants->occupation }}">
                    </div>
                    <div class="col">
                        <label>Occupation Place</label>
                        <input type="text" class="form-control" placeholder="" name="place" value="{{ $tenants->place }}">
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary btn-lg ml-3"  > Update  Tenant</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
    @include('layouts.footer2')
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/tenants.js"></script>
@endsection
