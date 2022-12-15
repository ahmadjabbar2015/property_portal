<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
<title>User management</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">

        <h2 class="h4">Users List</h2>

    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/users/create" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            New User
        </a>

    </div>
</div>


<div class="card card-body shadow border-0 table-wrapper table-responsive">

    <table class="table user-table table-hover align-items-center" id="user_table">
        <thead>
            <tr>
                <th class="border-bottom">
                    Id
                </th>
                <th class="border-bottom">Name</th>
                <th class="border-bottom">Role</th>
                <th class="border-bottom">Date Created</th>
                <th class="border-bottom">Email</th>
                <th class="border-bottom">Action</th>
            </tr>
        </thead>

    </table>
</div>
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/user.js"></script>
    @endsection
