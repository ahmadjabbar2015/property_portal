<x-layouts.base>
    @extends('layouts.app')

    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        {{-- saad --}}

        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-md-9 mt-3 shadow ">
                    <h2 class="mt-3 mb-4 ">
                        Leads details
                          ({{ $lead->created_at->format('Y-m-d')}}
                         )
                    </h2>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                            Next Follow Date
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->next_follow_date }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Lead Owner
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->first_name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Name
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->client_name }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Number
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->client_contact }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Email
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->client_mail }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Location
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->clinet_location }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Source
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->source }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Status
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->lead_status }}</h6>
                        </div>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Area Minimum
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->area_minimum }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Area Maximum
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->area_maximum }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                               Property Type
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $lead->type  }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Budget Minimum
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->budget_minimum  }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                                Budget Maximum
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->budget_maximum  }}</h6>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="mb-3">
                               Remarks
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6> {{ $attempt->aad_remark }}</h6>
                        </div>
                        <hr>
                    </div>
                   
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="button"><i class="fa fa-print" ></i>
                            Print</button>
                        <a href="/lead_reports/index">
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
