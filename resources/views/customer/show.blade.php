<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        {{-- saad --}}

        <div class="container">
            <a href="/customer/index">
                <button type="button" class="btn btn-primary btn-lg"><-Back Customer</button>
                </a>
            <div class="row text-center">
                <div class=" mt-6 ml-4">
                    <h1>
                        Customer Details
                    </h1>

                </div>
            </div><br>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded col-md-10">
                    <div class="text-end">
                        <h4>
                            Customer
                        </h4>
                        <button type="submit" class="btn btn-success"><a href="{{ url('/customer/edit/' . $data->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/customer/delete/' . $data->id) }}"> Delete
                            </a></button>
                    </div><br><br>
                    <h2>
                        ABOUT ME:
                    </h2>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-title ">First Name :</h5>
                            <p> {{ $data->first_name }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-title ">Last Name :</h5>
                            <p> {{ $data->last_name }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Email :</h5>
                            <p> {{ $data->email }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Phone Number : </h5>
                            <p> {{ $data->number }} </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Adrees : </h5>
                            <p> {{ $data->address }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Agent Name:</h5>
                            <p> {{ $data->name }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Property:</h5>
                               <p>  {{ $data->property_name }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Property Price:</h5>
                               <p>  {{ $data->deposit_cash }} </p>
                        </div>
                        <div class="col">
                            <h5  class="card-text">Advance Cash : </h5>
                                <p>{{ $data->advance_cash }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                    <h5 class="card-text">Remaining Cash :</h5>
                       <p>  {{ $data->remaining_cash }}</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-layouts.base>
