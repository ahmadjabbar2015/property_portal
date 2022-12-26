 @section('dashboard' , 'active')
<title>Dashboard</title>

    <div class="py-4">
    <h4>Dashboard</h4>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                            </div>

                            <div class="d-sm-none">
                                <h2 class="h5">Leads</h2>
                                <h3 class="fw-extrabold mb-1">{{$leadDataCount->count()}}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">Leads</h2>
                                <h3 class="fw-extrabold mb-2">{{$leadDataCount->count()}}</h3>
                            </div>
                            <small class="d-flex align-items-center text-dark-500">
                               Attempt:
                                   {{$status->count()}}
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Remaining:
                                    {{$statusAttempt->count()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Property</h2>
                                <h3 class="mb-1">{{$totalPropertyCount->count()}}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">Property</h2>
                                <h3 class="fw-extrabold mb-2">{{$totalPropertyCount->count()}}</h3>
                            </div><br><br>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-warning rounded me-4 me-sm-0">
                                <i class="fa fa-book" aria-hidden="true" style="font-size: 37px;"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Booking</h2>
                                <h3 class="mb-1">{{$totalSaleLeaseCount->count()}}</h3>
                            </div>
                            @php
                             $sum = 0;
                             $totalPaid = 0;
                            foreach ($totalSaleLeaseCount as $key => $total)
                            {
                                  $sum+= $total['total_sale_price'];
                                  $totalPaid+= $total['paid_payment'];

                            }
                            @endphp


                              </div>
                           <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">Booking</h2>
                                <h3 class="fw-extrabold mb-2">{{$totalSaleLeaseCount->count()}}</h3>
                            </div>
                            <small class="text-dark-500">
                                Total Payment :{{$sum}}

                            </small>
                             <div class="small d-flex mt-1">
                                <div>Total Paid Payment: {{$totalPaid}}</div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Rent lease start --}}
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-success rounded me-4 me-sm-0">
                                <i class="fa fa-key" aria-hidden="true" style="font-size: 30px;"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Rent</h2>
                                <h3 class="mb-1">{{$totalRentLeaseCount->count()}}</h3>
                            </div>
                        </div>
                        @php
                            $totalsum = 0;
                            $totalpaid =0;
                            foreach ($totalRentLeaseCount as $key => $i)
                            {
                                $totalsum+=$i['total_payment'];
                                $totalpaid+=$i['paid_payment'];
                            }
                        @endphp
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">Rent</h2>
                                <h3 class="fw-extrabold mb-2">{{$totalRentLeaseCount->count()}}</h3>
                            </div>
                            <small class="text-dark-500">
                              Total Payment:{{$totalsum}}
                            </small>
                            <div class="small d-flex mt-1">
                                <small class="text-dark-500">
                                    Total Paid Payment:{{$totalpaid}}
                                  </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Rend lease End --}}

        {{-- Tenants start --}}

        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">

                                    <i class="fa fa-male" aria-hidden="true" style="font-size: 30px"> </i>

                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Tenants</h2>
                                <h3 class="mb-1">{{$tenantCount->count()}}</h3>
                            </div>
                        </div>

                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">Tenants</h2>
                                <h3 class="fw-extrabold mb-2">{{$tenantCount->count()}}</h3>
                            </div><br><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tenants End --}}


          {{-- landload start --}}

          <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-danger rounded me-4 me-sm-0">

                                    <i class="fa fa-street-view" aria-hidden="true" style="font-size: 30px"> </i>

                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">LandLoad</h2>
                                <h3 class="mb-1">{{$landloadCount->count()}}</h3>
                            </div>
                        </div>

                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-dark-400 mb-0">LandLoad</h2>
                                <h3 class="fw-extrabold mb-2">{{$landloadCount->count()}}</h3>
                            </div><br><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lnadload End --}}

        <div class="col-12 mb-4">
            <div class="card border-0 shadow" style="background-color: #fac0b9">
                <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">Sales Chart</div>
                        <h2 class="fs-3 fw-extrabold"></h2>
                    </div>

                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-sales-value ct-double-octave ct-series-g">
                      @include('ticket.chart')
                    </div>
                </div>
            </div>
        </div>






    <!-- Leads charts -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow" style="background-color: mediumaquamarine;">
                <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">Leads Graphs</div>
                        <h2 class="fs-3 fw-extrabold"></h2>
                    </div>

                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-sales-value ct-double-octave ct-series-g">
                    @include('ticket.leads-chart')

                    </div>
                </div>
            </div>
        </div>

    <!-- Rent Lease charts -->

    <div class="col-12 mb-4">
            <div class="card border-0 shadow" style="background-color: tan;">
                <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">Rent Graphs</div>
                        <h2 class="fs-3 fw-extrabold"></h2>
                    </div>

                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-sales-value ct-double-octave ct-series-g">
                    @include('ticket.rentchart')

                    </div>
                </div>
            </div>
        </div>  
    </div>

