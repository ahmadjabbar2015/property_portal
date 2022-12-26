@extends('layouts.master')
@section('title' , 'View Tenant')
@section('view_tenant' , 'active')
@section('main')

    <div class="container">
        <div class="row">
            <div class="col" style="margin-top: -42px;">
                <div class="ms-2 me-2 mt-5 ">

                    <a href="/tenants"> <button class="btn btn-primary mt-5 ml-3 mb-3">Add Tenants
                        </button></a>

                    <div class="table-responsive">
                        <table class="table mt-4 yajra-datatable" id="tenants_data">
                            <thead>
                                <tr>
                                    <th scope="col" class="">ID</th>
                                    <th scope="col" class=""> Name</th>
                                    <th scope="col" class="">Email</th>
                                    <th scope="col" class="">Address</th>
                                    <th scope="col" class="">Tenant Identitfy</th>

                                    <th scope="col" class="">Actions</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection


@section('page-script')
    <script src="{{ asset('assets') }}/js/tenants.js"></script>
@endsection

