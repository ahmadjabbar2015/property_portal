<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
        <div class="container">
            <form action="{{ url('/lead/update/' . $lead->id) }}" method="POST" id="attemp_laeds">
                @csrf

                <div class="row">
                    <div class=" mt-6 ml-4">
                        <h1>
                            Leads Detalis
                        </h1>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-2 ml-2">
                            
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="">Client Name:*</label>
                                    <input type="text" class="form-control"  name="client_name" readonly
                                        value="{{ $lead->client_name }}">

                                </div>
                                <div class="col">
                                    <label for="">Client Contact:*</label>
                                    <input type="number" class="form-control"  name="client_contact" readonly
                                        value="{{ $lead->client_contact }}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for=""> Client Mail
                                    </label>
                                    <input type="email" class="form-control" placeholder="" name="client_mail" 
                                        value="{{ $lead->client_mail }}">
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="email">Client Location</label>
                                    <input type="text" class="form-control" placeholder="" name="clinet_location" 
                                        value="{{ $lead->clinet_location }}">

                                </div>

                            </div><br>
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <label for="vehicle1"> Select Property Type </label>

                                        <select class="form-select form-control" aria-label="" name="propertytype_id" readonly>
                                            <option selected value="{{ $lead->propertytype_id}}">
                                                {{ $lead->propertytype->type }}</option>
                                          

                                        </select>
                                    </div>


                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <label for="email">Property Area Minimum</label>
                                        <input type="number" class="form-control" placeholder="" name="area_minimum">

                                    </div>
                                    <div class="col">
                                        <label for="email">Property Area Maximum</label>
                                        <input type="number" class="form-control" placeholder="" name="area_maximum">

                                    </div>
                                </div>
                                <div class="col mt-4">

                                    <label for="vehicle1"> Select Source</label>
                                    <div class="input-group">
                                        <select class="form-select form-control" aria-label="" name="source_id" readonly>
                                            <option selected value="{{ $lead->source_id }}">
                                                {{ $lead->source->source }}
                                            </option>
                                        </select>
                                        

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <label for="email">Client Budget Minimum</label>
                                        <input type="number" class="form-control" placeholder="" name="budget_minimum">

                                    </div>
                                    <div class="col">
                                        <label for="email">Client Budget Maximum</label>
                                        <input type="number" class="form-control" placeholder="" name="budget_maximum">

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <label for="email">Lead Status</label>
                                        <select class="form-select form-control" aria-label="" name="lead_status">
                                               
                                                  <option id="Attempet" selected value="Attempet">
                                                    Attempet
                                                 </option>
                                                
                                                
                                        </select>

                                    </div>
                                    <div class="col">
                                        <label for="email">Class Status</label>
                                        <select class="form-select form-control" aria-label="" name="class_status">
                                            
                                              <option id="connected" value="connected">
                                                Connected
                                             </option>
                                            

                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="email">Next Follow Date</label>
                                    <input type="date" class="form-control" placeholder=""
                                        name="next_follow_date">

                                </div>
                                <div class="form-group mt-5">
                                    <label for="exampleFormControlTextarea1">Remarks: </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="aad_remark" > {{ $lead->remark }}</textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <button class="btn btn-lg btn-primary me-md-2" type="submit">save</button>
                            </div>
                        </div>
                    </div>

            </form>
        </div>

        {{-- <!-- Modal -->
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
                            <input type="text" class="form-control" placeholder="" name="source">
                        </div>
                        <div class="modal-footer">
                            <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary me-md-2" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}

    </main>
</x-layouts.base>
@section('page-script')
        <script src="{{ asset('assets') }}/js/attempt_index.js"></script>
    @endsection
