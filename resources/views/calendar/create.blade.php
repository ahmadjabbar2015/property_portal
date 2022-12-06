<x-layouts.base>
@extends('layouts.app')
@include('layouts.sidenav')
<main class="content">
  @include('layouts.topbar')
<div class="container">
<br>
<br>
</div>
<div class="container">
    <div class="row">
        <div class="row">
            <h1>Calander Events</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
               <!-- Button trigger modal -->

<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
  Add event
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/add_event" method="POST" id="regiester_events">
            @csrf
            <div class="container">
            <label for="add title" class="form-label">Add Title *</label>
            <input type="text" class="form-control" name="title" required>
            <label for="add title" class="form-label">Start Date *</label>
            <input type="date" class="form-control" name="start" required>
            <label for="add title" class="form-label">End Date *</label>
            <input type="date" class="form-control" name="end" required>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

      </div>
      </form>
    </div>
  </div>
</div> <!-- <button class="btn btn-primary"id="eventcreate">Create Event</button> -->
            </div>
            <hr>
            <div class="col-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>

</main>
</x-layouts.base>
@section('page-script')
   

<!-- evenet -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets') }}/js/event.js"></script>
@endsection