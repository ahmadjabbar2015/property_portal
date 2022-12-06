<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
                        <h1>Rent installment Table</h1>

                        <a href="/lease/index"> <button class="btn btn-danger mt-5 ml-3 mb-3">Back
                            </button></a>
                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class="">Due DAte</th>
                                        <th scope="col" class="">Payment</th>
                                        <th scope="col" class="">Status</th>




                                        <th scope="col" class="">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($data != null)

                                        @foreach ($data as $sale_installement)
                                            <tr>
                                                <td class=" get_rent_lease_id" style="display:none;">{{$sale_installement->rent_leases_id}}</td>
                                                <?php $date = explode(' ', $sale_installement->due_date); ?>
                                                <td class="rent_id">{{ $sale_installement->monthly }}</td>
                                                <td><input type="date" value="{{ date($date[0]) }}"></td>
                                                <td class="rent_payment">{{ $sale_installement->payment }}</td>
                                                @if ($sale_installement->status == 0)
                                                    <td class="text-danger">Not paid</td>
                                                @else
                                                    <td class="text-success">Paid</td>
                                                @endif



                                                @if ($sale_installement->status == 0)
                                                <td><button type="button" class="btn btn-primary rent_payment_btn" data-toggle="modal"
                                                        data-target="#exampleModalLong" id="rent_payment" >
                                                        Add Payment
                                                    </button></td>
                                                    @else
                                                    <td><button type="button" class="btn btn-primary payment_btn" disabled data-toggle="modal"
                                                        data-target="#exampleModalLong" >
                                                        Add Payment
                                                    </button></td>
                                                    @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>No Record Found</td>
                                        </tr>

                                    @endif
                                </tbody>




                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- model --}}

<!-- Modal -->
<form action="{{ url('payments/sale/rentstore')}}"  method="POST" >
    @csrf
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Payment Booking Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="rent_lease_id" value="">
                <input type="hidden" name="rent_monthly_id" value="">
                <div class="modal-body">
                    <label for="vehicle1">Due Date</label>
                    <input type="date" class="form-control"
                        name="due_date_rent" value="">
                </div>
                <div class="modal-body">
                    <label for="vehicle1">Payments</label>
                    <input type="number" class="form-control" value=""  name="rent_payment">
                </div>
                <div class="modal-body">
                    <label for="vehicle1">Current Date </label>
                    <input type="date" class="form-control"
                        name="rent_current_date" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

</x-layouts.base>
@section('page-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
