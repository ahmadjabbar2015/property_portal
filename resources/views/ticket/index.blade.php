<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  
    {{-- saad --}}
    <div class="container">

        <div class="row">
            <div class=" mt-6 ml-4">
                <h1>
                    Tickets
                </h1>
            </div>

        </div>
        <div class="row mr-2 ml-2">
            <div class="col shadow  ">
                <div class="mb-5">
                    <div class="row">
                        <div class="col">
                            <i class="fa-solid fa-tag  fa-4x ml-3 mt-5"></i>
                        </div>
                        <div class="col mt-7 ml-6">

                            <h2>{{ $total_ticket }}</h2>
                            <p> Total Tickets</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col shadow mr-3 ml-3">
                <div class="row">
                    <div class="col">
                        <i class="fa-regular fa-clock  fa-4x ml-3 mt-5"></i>
                    </div>
                    <div class="col  mt-7 ml-6">
                        <h2>{{ $ticket_pending }}</h2>
                        <p>Pending Tickets</p>
                    </div>
                </div>
            </div>
            <div class="col shadow">
                <div class="row">
                    <div class="col">
                        <i class="fa-regular fa-circle-check fa-4x ml-3 mt-5"></i>
                    </div>
                    <div class="col mt-7 ml-6">
                        <h2>{{ $ticket_assign }}</h2>
                        <p> Assign Tickets</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="ms-2 me-2 mt-5 shadow ">
            <div class="row">
                <div class="col-md-7 mt-5 ml-5 mb-3">
                    <h5>
                        Manage Tickets
                    </h5>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary payments-btn mt-5 ml-9 mb-3" data-toggle="modal"
                        data-target="#exampleModal"> Add Tickets </button>
                </div>
            </div>
            <div class="mr-3 ml-3">
                <div class="table-responsive">
                    <table class="table mt-4 yajra-datatable" id="tickets">
                        <thead>

                            <tr>
                                <th scope="col" class="">ID</th>
                                <th scope="col" class=""> Requested By </th>
                                <th scope="col" class="">Subject</th>
                                <th scope="col" class="">Assignee</th>
                                <th scope="col" class="">Priority</th>
                                <th scope="col" class="">Status</th>
                                <th scope="col" class="">Create Add</th>
                                <th scope="col" class="">Actions</th>
                            </tr>

                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.footer2')
</main>
</x-layouts.base>
<form method="POST" action="{{ url('ticket/store') }}" enctype="">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tickets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="Fname">Subject</label>
                    <input type="text" class="form-control" placeholder="Full name" name="subject" required><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Priority</label>
                            <select class="form-select form-control select2 " aria-label="Default select example"
                                name="priority" required>
                                <option value="">Chosse</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="">
                        <label for="exampleFormControlTextarea1"> Message/Task/Description </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
                        <input type="hidden"name="status" value="open">
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden"name="assign_to">

                    </div><br>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- <button type="button" class=" close btn btn-secondary " aria-label="Close"> Close</button> -->
                        <button type="submit" class="btn btn-primary">Create Tickets</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</form>
</div>




@section('page-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('assets') }}/js/ticket.js"></script>
@endsection
@section('custom-script')
<script>
    var table = $('#tickets').DataTable({

        processing: true,
        serverSide: true,
        url: "/ticket/index",
        columns: [{
                data: 'id',
                name: 'id',
            },


            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'subject',
                name: 'subject',
            },
            {
                data: 'assign_to',
                name: 'assign_to'
            },
            {
                data: 'priority',
                name: 'priority',
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'created_at',
                name: 'created_at',
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
