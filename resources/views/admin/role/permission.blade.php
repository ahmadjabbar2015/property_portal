@extends('layouts.master')
@section('title' , 'Permission')

@section('main')


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ms-2 me-2 mt-5 ">



                        <div class="table-responsive">
                            <form method="POST" action="{{ url('/permission/assign/'.$role_id) }}">
                                @csrf
                            <table class="table mt-4 yajra-datatable" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th class="col-md-6" class="">Module</th>
                                        <th scope="col-md-2" class="">Show</th>

                                        <th scope="col-md-2" class="">Create</th>
                                        <th scope="col-md-2" class="">Delete</th>
                                        <th scope="col-md-2" class="">Update</th>
                                    </tr>
                                </thead>
                                <tbody>



                                        <?php foreach ($permission_data as  $value) {


                                            ?>
                                            <tr>
                                                <td>{{$value->id}}</td>
                                           <td class="col-md-6" ><input  type="hidden" name="permission_id[{{$value->permission_id}}][permission_id]" value="{{$value->permission_id}}">{{$value->name}}</td>
                                           @if ($value->can_view == 1)
                                           <td ><input type="checkbox" checked value="{{$value->can_view}}" name="permission_id[{{$value->permission_id}}][show]"></td>
                                           @else
                                           <td ><input type="checkbox" value="0" name="permission_id[{{$value->permission_id}}][show]"></td>
                                           @endif
                                           @if ($value->can_create == 1)
                                           <td ><input type="checkbox" value="{{$value->can_create}}" checked  name="permission_id[{{$value->permission_id}}][create]" ></td>
                                           @else
                                           <td ><input type="checkbox" value="0" name="permission_id[{{$value->permission_id}}][create]" ></td>
                                           @endif
@if ($value->can_delete == 1)
<td ><input type="checkbox" value="{{$value->can_delete}}" checked name="permission_id[{{$value->permission_id}}][delete]" ></td>

@else
<td ><input type="checkbox" value="0" name="permission_id[{{$value->permission_id}}][delete]" ></td>

@endif
@if ($value->can_update == 1)
<td ><input type="checkbox" checked value="{{$value->can_update}}"? '0':'' name="permission_id[{{$value->permission_id}}][update]" ></td>

@else
<td ><input type="checkbox" value="0" name="permission_id[{{$value->permission_id}}][update]" ></td>

@endif



                                        </tr>
                                           <?php
                                        }
                                        ?>






                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        @endsection


@section('page-script')
    <script src="{{ asset('assets') }}/js/role.js"></script>
    @endsection
