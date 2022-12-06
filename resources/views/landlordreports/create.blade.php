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
                      Property Payments
                    </h1>
                </div>

            </div>
            <div class="">
                <div class="row ">
                    <div class="col shadow  ">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col">
                                    <i class="fa-solid fa-dollar-sign fa-4x ml-3 mt-5"></i>
                                </div>
                                <div class="col mt-7 ml-4">
                                    <h3> {{ $rents }}</h3>
                                                                    
                                    <p> Total Rent Collected</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col shadow mr-3 ml-3">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-dollar-sign fa-4x ml-3 mt-5"></i>
                            </div>
                            <div class="col  mt-7 ml-3">
                                <h3>{{ $depoists }}</h3>
                                <p>Total Company Profit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col shadow">
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-dollar-sign fa-4x ml-3 mt-5"></i>
                            </div>
                            <div class="col mt-7 ml-3">
                                <h3> {{ $total }}</h3>
                                <p> Total Paid To Tenants </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-5 col-md-6">

                        <input class="form-control form-control-solid" placeholder="Pick date rage"
                            id="kt_daterangepicker_4" />
                    </div>
                </div>
                <div class="ms-2 me-2 mt-5 shadow ">
                    <div class="mr-3 ml-3">
                        <div class="table-responsive">                         
                            <table class="table mt-4 yajra-datatable" id="landlordreports_data">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Property Name</th>
                                        <th scope="col" class="">Total Collected</th>
                                        <th scope="col" class="">Company Deduction</th>
                                        <th scope="col" class="">Net Income</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </main>

</x-layouts.base>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    }

    $("#kt_daterangepicker_4").daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            
            "Today": [moment(), moment()],
            "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf(
                "month")],
            "This Year": [moment().startOf("year"), moment().endOf("year")]
        }
        
    }, cb);

    cb(start, end);
</script>
