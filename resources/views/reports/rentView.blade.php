<x-layouts.base>
    @extends('layouts.app')

    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

       @php
                    $totalpaid = $alldata->total_payment;
                    $sale_remaning_payment = $alldata->paid_payment;
                    $total_remaning_payment =  $totalpaid-$sale_remaning_payment;
       @endphp

        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-md-9 mt-3 shadow ">

                    <h2 class="mt-3 mb-4 ">
                        Property Rent Details ({{date('F d, Y', strtotime($alldata->created_at))}})

                    </h2>

                        <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Property Name
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $alldata->name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Tenants Name
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $alldata->full_name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                rent
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{$alldata->rent}} </h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Installements
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $alldata->frequency_collection }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                              Start Lease
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ date('F d, Y', strtotime($alldata->lease_start)) }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                End Lease
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{date('F d, Y', strtotime($alldata->lease_end))}}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                              Due Date
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ date('F d, Y', strtotime($alldata->due_date)) }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Advance Payment
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $alldata->advance_payments }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Remaning Payment
                            </h6>
                        </div>
                        <div class="col-md-3">

                            <h6>{{$total_remaning_payment}}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                               Total payment
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $alldata->total_payment }}</h6>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-9">
                                <h6 class="mb-3">
                                  Paid payment
                                </h6>
                            </div>
                            <div class="col-md-3">
                                <h6>{{ $alldata->paid_payment }}</h6>
                            </div>
                            <hr>


                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <h4>Remaning Payment</h4>
                            <thead>
                                <tr>
                                <th>Due Date</th>
                                <th>No.OF Installements</th>
                                <th>Status</th>
                                <th>Payment</th>
                                </tr>
                            </thead>

                            <tbody>
                         @foreach ($rent_transaction as $item)
                                <tr>
                                    <td>{{date('F d, Y', strtotime($item->d_date))}}</td>
                                     <td>{{$item->monthly}}</td>
                                     @if ($item->status=='0')
                                         <td>Unpaid</td>
                                     @endif

                                    <td>{{$item->payment}}</td>
                                </tr>
                          @endforeach
                            </tbody>
                        </table>
    <div>
        <hr>

                        <div class="row">
                            <table class="table table-striped">
                                <h4>Piad Payment</h4>
                                <thead>
                                    <tr>
                                    <th>Due Date</th>
                                    <th>Paid Date</th>
                                    <th>Payment</th>
                                    </tr>

                                </thead>

                                <tbody>
                             @foreach ($rent_payments as $item)
                                    <tr>
                                        <td>{{date('F d, Y', strtotime($item->date))}}</td>
                                         <td>{{date('F d, Y', strtotime($item->paid_date))}}</td>
                                        <td>{{$item->payment}}</td>
                                    </tr>
                              @endforeach
                                </tbody>
                            </table>
                    </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button"><i class="fa fa-print"></i>
                        Print</button>
                    <a href="{{url("rentleasereports")}}">
                        <button class="btn btn-danger" type="button">Close</button>
                    </a>
                </div>
                <p class="text-center">
                    @ Cross Devlogix.Com
                </p>
            </div>

        </div>
    </main>
</x-layouts.base>
