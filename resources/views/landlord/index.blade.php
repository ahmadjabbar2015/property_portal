<x-layouts.base>
@extends('layouts.app')

@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  

<div class="container">
    <div class="row">
        <div class="col">
            <div class="ms-2 me-2 mt-5">

                <a href="/landlord"> <button class="btn btn-primary mt-5 ml-3 mb-3">Add Landlords
                    </button></a>

                <div class="table-responsive">
                    <table class="table landlords_data" id="landlords_data">
                        <thead>
                            <tr>
                                <th scope="col" class="">ID</th>
                                <th scope="col" class=""> Name</th>
                                <th scope="col" class="">Email</th>
                                <th scope="col" class="">Addrees</th>
                                <th scope="col" class="">Identity</th>
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

    <script src="{{ asset('assets') }}/js/landlord.js"></script>
@endsection
@section('custom-script')
<script>
    $('#landlords_data').DataTable({

processing: true,
serverSide: true,
url: "{{ route('landlord.index') }}",
columns: [{
        data: 'id',
        name: 'id',
    },
    {
        data: 'full_name',
        name: 'full_name',
    },
    {
        data: 'email',
        name: 'email',
    },
    {
        data: 'address',
        name: 'address',
    },
    {
        data: 'identity',
        name: 'identity',
    },
    {
        data: 'action',
        name: 'action',
        orderable: true,
        searchable: true
    },
]
});
</script>
@endsection
