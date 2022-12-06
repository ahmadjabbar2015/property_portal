<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">

                        <button type="button"  class="btn btn-danger mt-5 ml-3 mb-3"  data-toggle="modal" data-target="#exampleModalCenter"> Add Source
                            </button>
                        

                        <div class="table-responsive">
                            <table class="table mt-4 yajra-datatable" id="source_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="">ID</th>
                                        <th scope="col" class="">Source</th>
                                        <th scope="col" class=""> Create at</th>
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
    <script src="{{ asset('assets') }}/js/source.js"></script>
    @endsection
<form method="POST" action="{{ url('source/store') }}" id="">
    @csrf
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal
                        Source
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for=""> Source *</label>
                    <input type="text" class="form-control" placeholder="" name="source" required>
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary me-md-2" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
