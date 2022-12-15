
<x-layouts.base>
    @extends('layouts.app')
    @include('layouts.sidenav')
    <main class="content">
        @include('layouts.topbar')
    <title>Edit  Profile</title>
    <div>

        <div class="row">
            <div class="col-12 col-xl-12">

                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">General information</h2>
                    <form  action="{{ url('users/update/'.$user->id) }}" method="POST" id="user_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" value="{{$user->id}}">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" class="form-control" id="first_name" type="text"
                                        placeholder="Enter your first name" value="{{$user->first_name}}" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" class="form-control"  type="text"
                                        placeholder="Also your last name" value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="">New Password</label>
                                    <input name="password" class="form-control" type="password"
                                        placeholder="Password" >
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role_id" class="form-select mb-0" id="role"
                                    aria-label="role select example">
                                    <option selected value="{{$user->role_id }}">{{ $user->role_Id['name']}}</option>
                                    @foreach ($role as $roledata)
                                        <option
                                            value="{{ $roledata->id }}">{{ $roledata->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" readonly class="form-control" id="email" type="email"
                                        placeholder="name@gmail.com"  value="{{$user->email}}" >
                                </div>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-select mb-0" id="gender"
                                    aria-label="Gender select example" >
                                    <option selected value="{{$user->gender }}">{{ $user->gender}}</option>
                                    <option  value="Female">Female</option>
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
                                        placeholder="Enter your home address" value="{{$user->address}}">
                                </div>

                            </div>
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="number"> Contact Number</label>
                                    <input name="number" class="form-control" id="number" type="number"
                                        placeholder="No." value="{{$user->number}}">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input name="city" class="form-control" id="city" type="text"
                                        placeholder="City" value="{{$user->city}}">
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="zip">ZIP</label>
                                    <input name="ZIP" class="form-control" id="zip" type="tel"
                                        placeholder="ZIP" value="{{$user->ZIP}}">
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Update All</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</main>
</x-layouts.base>
@section('page-script')
    <script src="{{ asset('assets') }}/js/user.js"></script>
    @endsection
