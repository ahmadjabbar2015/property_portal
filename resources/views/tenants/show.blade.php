<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        <a href="/tenants/index">
        <button type="button" class="btn btn-primary btn-lg"><-Back Tenants</button>
        </a>
        <div class="container">

            <div class="row text-center">
                <div class=" mt-6 ml-4">
                    <h1>
                        Tenants Details
                    </h1>
                </div>
            </div><br>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4 col-md-10 ">
                    <div class="text-end">
                        <h4>
                            Reprehenderit anim
                        </h4>
                   
                        <button type="submit" class="btn btn-success"><a
                                href="{{ url('/tenants/edit/' . $tenants->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/tenants/delete/' . $tenants->id) }}">
                                Delete </a></button>
                    </div><br><br>
                    <h2>
                        ABOUT ME:
                    </h2>
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="card-title "> Name :</h5>
                            <p> {{ $tenants->full_name }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Email :</h5>
                            <p> {{ $tenants->email }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Phone Number :</h5>
                            <p> {{ $tenants->number }}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5 class="card-text">Identity No:</h5>
                            <p> {{ $tenants->identity }}</p>
                        </div>
                        <div class="col ">

                            <h5 class="card-text">Adrees : </h5>
                            <p> {{ $tenants->address }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Occupation :</h5>
                            <p> {{ $tenants->occupation }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="row mt-3">
                            <div class="col">
                                <h5 class="card-text">Occupation place : </h5>
                                <p>{{ $tenants->place }}</p>
                            </div>
                            <div class="col">

                                <h5 class="card-text">Docoument :<h5>
                                   <p> <img src="../../assets/img/{{ $tenants->image }}" alt="No-document" height="200"
                                        width="200">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('layouts.footer')
            @include('layouts.footer2')
    </main>
</x-layouts.base>
