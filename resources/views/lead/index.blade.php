<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
      
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
    
                        <a href="/lead"> <button class="btn btn-danger mt-5 ml-3 mb-3"> Add  Fresh lead
                            </button></a>
    
                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable" id="lead_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class=""> Lead Name</th>
                                        <th scope="col" class="">Contact History</th>
                                        <th scope="col" class="">Location</th>
                                        <th scope="col" class="">Property type</th>
                                        <th scope="col" class=""> Source</th>
                                        <th scope="col" class=""> Status</th>
                                        <th scope="col" class=""> Lead Owner </th>
                                        <th scope="col" class="">Remarks </th>
                                        <th scope="col" class=""> Create Date</th>
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
    <script src="{{ asset('assets') }}/js/lead.js"></script>
    @endsection
   
    
    