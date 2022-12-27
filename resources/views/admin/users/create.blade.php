@extends('layouts.master')
@section('title' , 'Create  Profile')
@section('main')
    
    <div>

        <div class="row">
            <div class="col-12 col-xl-12">

                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">General information</h2>
                    <form  action="{{ route('users.store') }}" method="POST" id="user_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" class="form-control" id="first_name" type="text"
                                        placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" class="form-control"  type="text"
                                        placeholder="Also your last name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="">Password</label>
                                    <input name="password" class="form-control" type="password"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role_id" class="form-select mb-0" id="role"
                                    aria-label="role select example">
                                    <option selected disabled>Choose an Option</option>
                                    @foreach ($role as $propertydata)
                                        <option
                                            value="{{ $propertydata->id }}">{{ $propertydata->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control" id="email" type="email"
                                        placeholder="name@gmail.com" onfocusout="myFunction()" >
                                </div>
                                <span class="text-danger fst-italic" id="userError"> </span>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">

                                    <option selected value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                        </div>
                        <h2 class="h5 my-4">Location</h2>
                        <div class="row">
                            <div class="col-sm-9 mb-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input name="address" class="form-control" id="address" type="text"
                                        placeholder="Enter your home address">
                                </div>

                            </div>
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="number"> Contact Number</label>
                                    <input name="number" class="form-control" id="number" type="number"
                                        placeholder="No.">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input name="city" class="form-control" id="city" type="text"
                                        placeholder="City">
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="zip">ZIP</label>
                                    <input name="ZIP" class="form-control" id="zip" type="tel"
                                        placeholder="ZIP">
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    @endsection

@section('page-script')
    <script src="{{ asset('assets') }}/js/user.js"></script>
    @endsection
