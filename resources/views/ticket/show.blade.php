<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">

    @include('layouts.topbar')
  

    <div class="container">

        <div class="row">
            <div class=" mt-6 ml-4">
                <h1>
                    Details Tickets
                </h1>
            </div>
        </div><br>
        <div class="shadow -lg-3 p-3 mb-5 bg-body rounded  col">
            <div class="row">
                <div class="col-md-8 ">
                    <h4 class="ml-4">
                        REQUEST RENT PAYMENT
                    </h4>
                </div>

                <div class="col-md-3 d-grid gap-2 d-md-flex justify-content-md-end mr-2">
                    <button type="submit" class="btn  btn-info "><a href="#">
                            Edit </a></button>
                    <button type="submit" class="btn  btn-danger "><a href="#">
                            Delete </a></button>
                </div><br><br>
            </div><br><br>

            @foreach ($ticket as $ticket)
                <div class="row">
                    <div class="col-md-5 ">
                        <div class="ml-3">
                            <h6 class="card-title "> Reporty By :</h6>
                            <p> {{ $ticket->name }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ml-4">
                            <h6 class="card-title "> Assigned To :</h6>
                            <select class="form-select form-control select2 " aria-label="Default select example"
                                name="assign_name">
                                <option> <?php if($ticket->assign_name==null){?>
                                    No Assign
                                    <?php  
                            }else{?>
                                    {{ $ticket->assign_name }}
                                    <?php
                            } ?></option>
                            </select>
                        </div>
                    </div>
                </div><br><br>
                <div class="ml-3">
                    <h6 class="card-title "> Create on :</h6>
                    <p> {{ $ticket->created_at }}</p>
                </div>
                <br><br>
                <div class="row">
                    <div class=" col ml-3">
                        <h6 class="card-title "> Status</h6>
                        <select class="form-select form-control select2 w-25" aria-label="Default select example"
                            name="assigned">
                            <option>{{ $ticket->status }}</option>
                        </select>

                    </div>
                    <div class=" col ml-3">
                        <h6 class="card-title ">Priority</h6>
                        <select class="form-select form-control select2  w-25" name="priority">
                            <option>{{ $ticket->priority }}</option>
                        </select>
                    </div>
                </div><br><br>
            @endforeach
            <div class=" col">
                <h6 class="card-title ">Overview :</h6>
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
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/ticket.js"></script>
@endsection
