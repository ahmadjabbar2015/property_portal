<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    @include('layouts.topbar')
    <main class="content">
        <div class="container">
            <form method="POST" action="{{ url('tenant/store') }}" enctype="multipart/form-data" id="regiester_tenants">
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
                    {{-- {{ $slot }} --}}
                    <p>Tennat Tennats Creats Subtitle</p><br>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="Fname">Full name :*</label>
                            <input type="text" class="form-control" placeholder="Full name" name="full_name">

                        </div>

                        <div class="col">
                            <label for="email">Email :*</label>
                            <input type="email" class="form-control" placeholder="email" name="email">

                        </div>
                    </div><br>
                    <div class="row ">
                        <div class="col">
                            <label>Phone Number :*</label>
                            <input type="text" class="form-control" placeholder="12321" name="number">

                        </div>

                        <div class="col">
                            <label>Identity No/Passport</label>
                            <input type="text" class="form-control" placeholder="123321" name="identity">
                        </div>
                    </div><br>

                    <div class="row ">
                        <div class="col">
                            <label for="file">Identifcation Docoument</label>
                            <input type="file" class="form-control" id="" name="image">
                         
                        </div>
                        <div class="col">
                            <label>Address :*</label>
                            <input type="text" class="form-control" placeholder="address" name="address">

                        </div>
                    </div><br>

                    <div class="progress" style="height: 50px;">

                        <h4 class="mt-3  ml-5"> <i class="fa fa-bookmark  "></i> PLACE OF WORK</h4>
                    </div><br>
                    <div class="row ">
                        <div class="col">

                            <label>Occupation Status</label>
                            <select class="form-select form-control select2 " aria-label="Default select example"
                                name="occupation">
                                <option value="">Chosse</option>
                                <option value="Employee">Employee</option>
                                <option value="Employer">Employer</option>
                                <option value="Employer">Self Employer</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>
                        <div class="col">
                            <label>Occupation Place</label>
                            <input type="text" class="form-control" placeholder="" name="place">
                        </div>
                    </div><br>

                    <div class="progress" style="height: 50px;">

                        <h4 class="mt-3  ml-5"> <i class="fa fa-bookmark  "></i> INCASE OF EMERGENCY CONTACT</h4>
                    </div><br>
                    <div class="row ">
                        <div class="col">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                        </div>
                        <div class="col">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" placeholder="" name="phone">
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-lg ml-3">Register Tenant</button>
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
