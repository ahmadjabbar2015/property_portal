<x-layouts.base>
@extends('layouts.app')

@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
  


<div class="container">
    <form action="{{ url('landlord/update/'.$landlords->id) }}" method="POST" enctype="multipart/form-data" id="regiester_landlords">
        @csrf
    <div class="row">
    <div class=" mt-6 ml-4">
        <h1>
            Register  Landlord
        </h1>
    </div>
</div><br>
<div class="shadow -lg-3 p-3 mb-5 bg-body rounded mr-2 ml-2">
    <h4>
        Register New  Landlord
    </h4>
    <p>Register landlord  will be receive wellcom email with login credentiels</p><br>
    <div class="row mt-2">
        <div class="col">
            <label>Full name*:</label>
            <input type="text" class="form-control" placeholder="Full name" name="full_name" value="{{ $landlords->full_name}}">
          
        </div>
        <div class="col">
            <label>Email*:</label>
            <input type="text" class="form-control" placeholder="email" name="email" value="{{ $landlords->email}}">
           
        </div>
        <div class="col">
            <label>Phone Number*:</label>
         
        </div>
    </div><br><br>
    <div class="row ">
        <div class="col">
            <label>Identity No/Passport</label>
            <input type="text" class="form-control" placeholder="123321" name="identity" value="{{ $landlords->identity}}">
        </div>
        <div class="col">
            <label>Identifcation Docoument</label>
            <input type="file" class="form-control" name="image" value="{{ $landlords->image}}">
            <img src="../../assets/img/{{ $landlords->image }}" alt="No-document"
            height="200" width="200"> </p>
        </div>

    </div><br><br>
    <div class="row ">
        <div class="col">
            <label>Address*:</label>
            <input type="text" class="form-control" placeholder="address" name="address" value="{{ $landlords->address}}">
         
        </div>
        <div class="col">
            <label>Bnak Associated</label>
            <input type="text" class="form-control" placeholder="" name="occupation" value="{{ $landlords->occupation}}">
        </div>
        <div class="col">
            <label>Bank Account No</label>
            <input type="text" class="form-control" placeholder="" name="account" value="{{ $landlords->account}}">
        </div>
    </div><br>
    <button type="submit" class="btn btn-primary btn-lg ml-3">Register Landlord</button>
</div>
</form>
</div>

</main>
</x-layouts.base>
        {{-- @include('layouts.footers.auth') --}}


