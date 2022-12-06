<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
      
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">
                        <div class="mt-7">

                    </div>
                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable" id="attempt_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class=""> Lead Name</th>
                                        <th scope="col" class="">Contact</th>
                                        <th scope="col" class="">Mail</th>
                                        <th scope="col" class="">Location</th>
                                        <th scope="col" class="">Property type</th>
                                        <th scope="col" class="">Area Min</th>
                                        <th scope="col" class="">Area Mix</th>
                                        <th scope="col" class=""> Source</th>
                                        <th scope="col" class="">  Budget Min</th>
                                        <th scope="col" class="">Budget Max</th>
                                        <th scope="col" class=""> Lead Status</th>
                                        <th scope="col" class=""> Calss Status </th>
                                        <th scope="col" class=""> Next Follow Date</th>
                                        <th scope="col" class="">Add Remarks</th>
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
    <script src="{{ asset('assets') }}/js/attempt_index.js"></script>
    @endsection
   
    
    