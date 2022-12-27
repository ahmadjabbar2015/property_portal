@extends('layouts.master')
@section('title' , 'Add Agent')
@section('add_agent' , 'active')
@section('main')
        <div class="container ">
            <div class="row mt-3">
                <div class="col-md-12">
                <h1>Agents Form</h1>
                </div>
            </div>
            <form method="POST" action="/agent/store" id="regiester_agent">
                @csrf
                <div class="mt-2">
                    <h4 class="ml-4  mt-4 ">
                        New Agent Add
                    </h4>
                    <p></p>
                    <div class="row ml-2 mr-2 mt-4">
                        {{-- <input type="hidden" class="form-control" placeholder="" name="customer_id" id=""> --}}
                        <div class="col">
                            <label for="Fname"> Name :*</label>
                            <input type="text" class="form-control" placeholder=" name" name="name"
                                id="name">
                        </div>
                        <div class="col">
                            <label for="email">Email :*</label>
                            <input type="email" class="form-control" placeholder="email" name="email"
                                id="email">
                        </div>


                    </div>
                    <div class="row ml-2 mr-2 mt-4">

                        <div class="col">
                            <label for="Fname">Phone Number:*</label>
                            <input type="number" class="form-control" placeholder="Number" name="number"
                                id="number">
                        </div>
                        <div class="col">
                            <label for="Fname">Address:*</label>
                            <input type="text" class="form-control" placeholder="Address" name="address"
                                id="address">
                        </div>
                    </div>
                 

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button class="btn btn-lg btn-primary me-md-2" type="submit">Create Agent</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
 
@section('page-script')
    <script src="{{ asset('assets') }}/js/agent.js"></script>
@endsection
