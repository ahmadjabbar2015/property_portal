<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        {{-- saad --}}

        <div class="container">
            <a href="/customers/index">
                <button type="button" class="btn btn-primary btn-lg">
                    Back Customer</button>
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
                        <button type="submit" class="btn btn-success"><a href="#">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a href="#"> Delete
                            </a></button>
                    </div><br><br>
                    <h2>
                        ABOUT Customer:
                    </h2>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-title ">First Name :</h5>
                            <p> {{ $data->client_name }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-title ">Contact No.:</h5>
                            <p> {{ $data->client_contact }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Email :</h5>
                            <p> {{ $data->client_mail }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">

                        <div class="col">
                            <h5 class="card-text">Location : </h5>
                            <p> {{ $data->clinet_location }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Agent Name:</h5>
                            <p> {{ $data->agent_name }} </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Description:</h5>
                            <p> {{ $data->attempt_remark }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Property:</h5>
                            <p> {{ $data->property_name }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Property Type:</h5>
                            <p> {{ $data->type }} </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Source: </h5>
                            <p>{{ $data->source }}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Lead Owner:</h5>
                            <p> {{ $data->leads_creater }}</p>
                        </div>

                        <div class="col">
                            <h5 class="card-text">Lead Date: </h5>
                            <p> {{date('F d, Y', strtotime($data->created_at))}}</p>

                        </div>
                        <div class="col">
                            <h5 class="card-text">Cutomer Created Date: </h5>
                            <p>
                                {{date('F d, Y', strtotime($data->customer_create_date))}}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Last Follow Date: </h5>
                            <p>
                                {{date('F d, Y', strtotime($data->last_follow_date ))}}
                            </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Customer Budget: </h5>
                            <p>{{ $data->budget_maximum }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Customer Remarks : </h5>
                            <p>{{ $data->remark }}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</x-layouts.base>
