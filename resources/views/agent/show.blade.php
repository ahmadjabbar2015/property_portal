<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        {{-- saad --}}

        <div class="container">

            <div class="row text-center">
                <div class=" mt-6 ml-4 ">
                    <h1>
                        Agent Details
                    </h1>

                </div>
            </div><br>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded col-md-10">
                    <div class="text-end">
                        <h4>
                            Agent
                        </h4>
                        <button type="submit" class="btn btn-success"><a href="{{ url('/agent/edit/' . $agent->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/agent/delete/' . $agent->id) }}">
                                Delete </a></button>
                    </div><br><br>
                    <h2>
                        ABOUT ME:
                    </h2>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title "> Name :<h5>
                                    <p> {{ $agent->name }} </P>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Email :<h5>
                                    <p> {{ $agent->email }} </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Phone Number :</h5>
                                <p> {{ $agent->number }} </p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Adrees : </h5>
                               <p> {{ $agent->address }}</p>
                        </div>
                    </div>

                </div>
                <div>
                </div>
    </main>
</x-layouts.base>
