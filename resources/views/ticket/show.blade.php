@extends('layouts.master')
@section('title' , 'Show Ticket')
@section('main')
  

    <div class="container">

        <div class="row">
            <div class=" col-md-12 mt-3  ml-4">
                <h1>Details Tickets</h1>
            </div>
        </div>
        <div class="shadow -lg-3 p-3 mb-2    bg-body rounded  col">
            <div class="row">
                <div class="col-md-8 ml-4">
                    <h4>
                        REQUEST RENT PAYMENT
                    </h4>
                </div>

                <div class="col-md-4 mb-3">
                    <button type="submit" class="btn  btn-info "><a href="#">
                            Edit </a></button>
                    <button type="submit" class="btn  btn-danger "><a href="#">
                            Delete </a></button>
                </div
            </div>

            @foreach ($ticket as $ticket)
                <div class="row text-centar">
                    <div class="col ml-3 col-xs-6">
                       
                            <h6 class="card-title"> Reporty By:</h6>
                            <p> {{ $ticket->name }}</p>
                    
                    </div>

                    <div class="col ml-4 col-xs-6">
                      
                            <h6 class="card-title "> Assigned To:</h6>
                            <p>No Assign</p>
                      
                    </div>
                </div><br><br>

                <div class="ml-3">
                    <h6 class="card-title "> Created on:</h6>
                    <p> {{ date('F d, Y', strtotime($ticket->created_at)) }}</p>
                </div>
                <br><br>
                <div class="row">
                    <div class=" col-md-4 ml-3">
                        <h6 class="card-title ">Status</h6>
                        <select class="form-select form-control" name="assigned">
                            <option>{{ $ticket->status }}</option>
                        </select>

                    </div>
                    <div class="col-md-4 ml-3 mb-4">
                        <h6 class="card-title ">Priority</h6>
                        <select class="form-select form-control" name="priority">
                            <option>{{ $ticket->priority }}</option>
                        </select>
                    </div>
                </div>
            @endforeach
            <div class="col">
                <h6 class="card-title ">Overview:</h6>
                <p> {{ $ticket->description }}</p>
                </select>
            </div>
        </div>

        <!-- <div class="shadow mt-6 ">
            <div class="ml-4 mr-4"><br>
                <div class="row">
                    <div class="col">
                        <h4>
                            Discussion(0)
                        </h4><br><br>
                    </div>
                    <div class="col ml-9 d-grid gap-2 d-md-flex justify-content-md-end mr-2">
                        
                        <select class="form-select form-control select2 w-25" aria-label="Default select example"
                        name="assigned">
                    </select>
                    </div>
                </div>
                <div class="">

                    <textarea class="form-control" placeholder="Your message" id="exampleFormControlTextarea1" rows="3"
                        name="description"></textarea>

                </div><br>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-2">
                <button class="btn btn-lg btn-primary me-md-2" type="submit">Send Reply</button>
            </div>
            <br><br>
        </div> -->
    </div>
@endsection 
@section('page-script')
    <script src="{{ asset('assets') }}/js/ticket.js"></script>
@endsection
