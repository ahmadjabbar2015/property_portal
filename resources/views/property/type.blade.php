<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
 @include('layouts.topbar')


    <div class="container">
        <form method="POST" action="{{ url('propertytype/store') }}" enctype="" id="regiester_propertytype">
            @csrf
            <div class="row">
                <div class=" mt-6 ml-4">
                    <h1>
                        Type
                    </h1>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-4 ml-4">
                        <h4>
                            Property Type
                        </h4><br>

                        <div class=" mt-2">
                            <div class="col">
                                <label for="Fname">Type :*</label>
                                <input type="text" class="form-control" placeholder="" name="type" id="type">
                                <span id="type_id" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="col">
                                <label for="">Description </label>
                                <input type="" class="form-control" placeholder=""
                                    rows="3"name="description">

                            </div>
                        </div><br>

                        <button type="submit" class="btn btn-primary  ml-3">Register Type</button>
                    </div>
        </form>
    </div>


    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table mt-4 yajra-datatable" id="type_data">
                <thead>
                    <tr>
                        <th scope="col" class="">ID</th>
                        <th scope="col" class=""> Name</th>
                        <th scope="col" class=""> Description</th>
                        <th scope="col" class="">Actions</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    </div>
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/propertytype.js"></script>
@endsection

{{-- @include('layouts.footers.auth') --}}
