<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
<div class="container">
    <div class="row">
        <div class="col">
            <div class="ms-2 me-2 mt-5">

                <a href="/inventory"> <button class="btn btn-primary mt-5 ml-3 mb-3">Add Inventory
                    </button></a>

                <div class="table-responsive">
                    <table class="table landlords_data" id="inventory_table">
                        <thead>
                            <tr>
                                <th scope="col" class="">ID</th>
                                <th scope="col" class="">Title </th>
                                <th scope="col" class="">Description</th>
                                <th scope="col" class="">Create on</th>
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
<script src="{{ asset('assets') }}/js/inventory.js"></script>
@endsection
@section('custom-script')
<script>
    var table = $('#inventory_table').DataTable({
        
        processing: true,
        serverSide: true,
    
        url: "{{ route('inventory.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data:'description',
                name:'description'
            },
            {
                data: 'created_at',
                name: 'created_at'
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




