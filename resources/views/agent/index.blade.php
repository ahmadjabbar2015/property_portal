<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="ms-2 me-2 mt-5">
               
                <a href="/agent"> <button class="btn btn-primary mt-5 ml-3 mb-3">Add Agent
                    </button></a>

                <div class="table-responsive">
                    <table class="table landlords_data" id="agent_data">
                        <thead>
                            <tr>
                                <th scope="col" class="">ID</th>
                                
                                <th scope="col" class="">  Name </th>
                                <th scope="col" class="">Email</th>
                                <th scope="col" class="">Number</th>
                                <th scope="col" class="">Address</th>
                                {{-- <th scope="col" class="">Agent Name</th>
                                <th scope="col" class="">Tenants</th>
                                <th scope="col" class="">Landlord</th>
                                <th scope="col" class="">Property</th>
                                <th scope="col" class="">Deposit Cash</th>
                                <th scope="col" class="">Remaining Cash</th> --}}
                                <th scope="col" class="">Actions</th>
                            </tr>
                          
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

</main>

</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/agent.js"></script>
@endsection


