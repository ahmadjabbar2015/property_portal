<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
                        <h1>Sale Payment Table</h1>

                        <a href="/lease/sale/index"> <button class="btn btn-danger mt-5 ml-3 mb-3">Back
                            </button></a>
                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class="">Due DAte</th>
                                        <th scope="col" class="">Payment</th>
                                        <th scope="col" class="">Collect Date</th>





                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($data != null)
                                        <?php $no = 1; ?>
                                        @foreach ($data as $sale_payment)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <?php $date = explode(' ', $sale_payment->due_date); ?>
                                                <td class="">{{ $sale_payment->due_date }}</td>

                                                <td class="">{{ $sale_payment->payment }}</td>
                                                <td>
                                                    {{ $sale_payment->current_date }}
                                                </td>

                                                <?php $no++; ?>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="colpann 3">No Record Found</td>
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
</x-layouts.base>







<!-- Button trigger modal -->




@section('page-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('assets') }}/js/lease.js"></script>
@endsection
