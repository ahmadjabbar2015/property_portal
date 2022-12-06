<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
    @include('layouts.topbar')
    {{-- saad --}}

    <div class="container">
      
            
      
        

        <div class="row  ">
            @foreach ($data as $data)
                
          
            <div class=" col-md-7 mt-7 ml-4">
                <h1>
                    Show Inventory
                </h1>
            </div>
            <div class="col-md-4 mt-7 ">
                <a class="btn btn-lg btn-secondary me-md-2 ml-8" type="submit" href="/inventory/index">Back To Inventory </a>
            </div>

        </div><br>
        <div class="">
            <div class="row ml-3">
                <div class="col">
                    <P class="card-title "> Inventory For : </P>
                    <h5>    
                         {{ $data->name }}
                    </h5>
                </div>
                <div class="col">
                    <P class="card-title "> Type :</P>
                    <h5>    
                         {{ $data->unit }} 
                        
                    </h5>
                </div>
            </div><br><br>
            <div class="col ml-3">
                <h5 class="card-title "> Description :</h5>
                <p>    
                    {{ $data->description }}
                </p>
            </div><br><br>
            <div class="col ml-3 mb-8">
                <h5 class="card-title "> image :</h5>
                    
               
                    <img src="../../assets/img/{{ $data->image }}" alt="image" height="200" width="200">
                    <p>   {{ $data->image }}</p>
                
            </div><br><br><br><br>
        </div>
        @endforeach


    </div>

</main>
</x-layouts.base>
    @section('page-script')
<script src="{{ asset('assets') }}/js/inventory.js"></script>
@endsection


