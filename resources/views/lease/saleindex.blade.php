<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
                        <h1>Booking Laese Table</h1>
                        <a href="/lease"> <button class="btn btn-danger mt-5 ml-3 mb-3"> Add Sale Lease
                            </button></a>

                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable" id="sale_leases_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class="">Property</th>
                                        <th scope="col" class="">Customer Name</th>
                                        <th scope="col" class="">Property Unit</th>
                                        <th scope="col" class="">Sale Price</th>
                                        <th scope="col" class="">Remaning Payment</th>
                                        <th scope="col" class="">Installement</th>
                                        <th scope="col" class="">No.of yaers/month</th>
                                        <th scope="col" class="">Payment Pr M/Y</th>
                                        <th scope="col" class="">Due date</th>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
