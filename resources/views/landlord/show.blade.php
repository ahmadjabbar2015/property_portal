<x-layouts.base>
    @extends('layouts.app')

    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        {{-- saad --}}

        <div class="container">
            <a href="/landlord/index">
                <button type="button" class="btn btn-primary btn-lg"><-Back Landlord</button>
                </a>
            <div class="row text-center">
                <div class=" mt-6 ml-4">
                    <h1>
                        Landlord Details
                    </h1>

                </div>
            </div><br>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4 col-md-10">
                    <div class="text-end">
                        <h4>
                            Hello Landlord
                        </h4>
                        <button type="submit" class="btn btn-success"><a
                                href="{{ url('/landlord/edit/' . $landlord->id) }}">
                                Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/landlord/delete/' . $landlord->id) }}">
                                Delete </a></button>
                    </div><br><br>
                    <h2>
                        ABOUT ME:
                    </h2>
                    <div class="row mt-3">
                        <div class="col">
                            <h5 class="card-title ">Full Name : </h5>
                            <p> {{ $landlord->full_name }}</P>
                        </div>
                        <div class="col">


                            <h5 class="card-text">Email :</h5>
                            <p> {{ $landlord->email }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Phone Number :</h5>
                            <p> {{ $landlord->number }}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col" >
                            <h5 class="card-text">Adrees : <h5>
                               <p> {{ $landlord->address }}</p>
                        </div>
                        <div class="col">

                            <h5 class="card-text">Bank Associated : </h5>
                              <p>  {{ $landlord->occupation }}</p>
                        </div>
                        <div class="col">

                            <h5 class="card-text">Bank Acoount No :</h5>
                                <p> {{ $landlord->account }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                    <h5 class="card-text">Documents:</h5>
                       <p> <img src="../../assets/img/{{ $landlord->image }}" alt="No-document" height="200"
                            width="200">
                    </p>
                </div>
                </div>

            </div>
        </div>
    </main>
</x-layouts.base>
