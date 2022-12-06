<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        {{-- saad --}}
        <div class="container">
            <form method="POST" action="{{ url('lead/store') }}" enctype="" id="regiester_lead">
                @csrf
                <div class="row">
                    <div class=" mt-6 ml-4">
                        <h1>
                            Leads
                        </h1>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-2 ml-2">
                            <h4>
                                Add Leads
                            </h4>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">

                                            <label for="">Phone Number :*</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="number" class="client_contact form-control"
                                                name="client_contact" value="" id="client_contact"
                                                onfocusout="myFunction()">
                                        </div>
                                    </div>
                                    <span class="text-danger fst-italic" id="userError"> </span>

                                </div>

                                <div class="col">
                                    <label for="">Client Name :* </label>
                                    <input type="text" class="form-control" placeholder="" name="client_name">

                                </div>

                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for=""> Client Mail :
                                    </label>
                                    <input type="email" class="form-control" placeholder="" name="client_mail">
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="email">Client Location :</label>
                                    <input type="text" class="form-control" placeholder="" name="clinet_location">

                                </div>

                            </div><br>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="vehicle1"> Select Property Type :*</label>

                                        <select class="form-select form-control" aria-label="" name="propertytype_id">
                                            <option selected disabled>Choose an Option</option>
                                            @foreach ($propertytype as $propertydata)
                                                <option value="{{ $propertydata->id }}">
                                                    {{ $propertydata->type }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6 ">

                                        <label for="vehicle1"> Select Source :*</label>

                                        <select class="form-select form-control" aria-label="" name="source_id">
                                            <option selected disabled>Choose an Option</option>


                                            @foreach ($source as $soursedata)
                                                <option value="{{ $soursedata->id }}">
                                                    {{ $soursedata->source }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <label for="vehicle1"> Status :*</label>

                                        <select class="form-select form-control" aria-label="" name="status">
                                            <option selected disabled>Choose an Option</option>
                                            <option value="open">OPEN</option>
                                            <option value="close">CLOSE</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-5">
                                        <label for="exampleFormControlTextarea1">Remarks: </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <button class="btn btn-lg btn-primary me-md-2" type="submit">Create Lead</button>
                            </div>
                        </div>
                    </div>
            </form>
    </main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/lead.js"></script>
@endsection
