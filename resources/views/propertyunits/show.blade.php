<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        {{-- saad --}}

        <div class="container">
            <a href="/propertyunits/index">
                <button type="button" class="btn btn-primary btn-lg">
                    <-BacK TO Units</button>
            </a>
            <div class="row text-center">
                <div class=" mt-6 ml-6 col-md-10">
                    <h1>
                        Units Details
                    </h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4 col-md-10">

                    <h2 class="text-center">
                        Property Units Details
                    </h2>


                    @foreach ($propertyunits as $propertyunits)
                        <div class="row mt-4">
                            <div class="col">
                                <h5 class="card-title ">Select Main Property : </h5>
                                <p> {{ $propertyunits->name }}</P>
                            </div>
                            <div class="col">
                                <h5 class="card-text"> Property Units Title:</h5>
                                <p>{{ $propertyunits->title }}</p>
                            </div>
                            <div class="col">
                                <h5 class="card-text"> Commission :</h5>
                                <p> {{ $propertyunits->commission }}</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h5 class="card-text">Description :<h5>
                                        <p>{{ $propertyunits->description }} </p>
                            </div>

                            <div class="col">
                                <h5 class="card-text">image:</h5>
                                <img src="../../assets/img/{{ $propertyunits->image }}" alt="image" height="200"
                                    width="200">
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <button type="submit" class="btn btn-success"><a
                                href="{{ url('/propertyunits/edit/' . $propertyunits->id) }}"> Edit</a></button>
                        <button type="submit" class="btn btn-danger"><a
                                href="{{ url('/propertyunits/delete/' . $propertyunits->id) }}"> Delete </a></button>

                    </div>
                </div>
            </div>
    </main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/propertyunits.js"></script>
@endsection
