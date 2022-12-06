<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        <div class="container">

            <div class="ms-2 me-2 mt-5">
                <div class="mt-8">

                </div>
                {{-- <a href="/customers"> <button class="btn btn-primary mt-5 ml-3 mb-3">Add Customer
                          </button></a> --}}
            </div>
            <div class="table-responsive">
                <table class="table landlords_data" id="customer_data">
                    <thead>
                        <tr>
                            <th scope="col" class="">ID</th>
                            <th scope="col" class="">Customer Name</th>
                            <th scope="col" class="">Agent Name</th>
                            <th scope="col" class="">Property</th>
                            <th scope="col" class="">Deposit Cash</th>
                            <th scope="col" class="">Description</th>
                            <th scope="col" class="">Create Date</th>
                            <th scope="col" class="">Actions</th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>

    </main>


</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/customer.js"></script>
@endsection
