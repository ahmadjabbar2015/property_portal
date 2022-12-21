<x-layouts.base>
<main>
    <title>crossdevlogix</title>
        <!-- Section -->

            <div class="container">
                <div wire:ignore.self class="row form-bg-image" data-background-lg="/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-12 col-xl-9">
                            <div class="card card-body border-0 shadow mb-4">
                                <h2 class="h5 mb-4">Bussniess information</h2>
                                <form  action="{{ route('bussniess.store') }}" method="POST" id="bussniess_regiestration_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <div>
                                                <label for="name">Bussniess Name:*</label>
                                                <input name="name" class="form-control" id="name" type="text"
                                                    placeholder="Enter your bussniess name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <label for="date">Start Date</label>
                                                <input name="date" class="form-control"  type="Date"
                                                    placeholder="Start Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div>
                                                <label for="">Select Country:*</label>
                                                <input name="country" class="form-control" type="text"
                                                    placeholder="Select Country">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="state">State:*</label>
                                                <input name="state" class="form-control" type="text"
                                                    placeholder="State" >
                                            </div>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="city">City:*</label>
                                                <input name="city" class="form-control" type="text"
                                                    placeholder="City" >
                                            </div>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code:*</label>
                                                <input name="zip_code" class="form-control" type="text"
                                                    placeholder="ZIP Code" >
                                            </div>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="landmark">Landmark:*</label>
                                                <input name="landmark" class="form-control" type="text"
                                                    placeholder="LandMark" >
                                            </div>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Logo</label>
                                            <input class="form-control" type="file" name="logo">
                                        </div>
                                    </div>


                                    </div>

                                    <h2 class="h5 my-4">Owner Information</h2>
                                    <div class="row">
                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">
                                                <label for="first_name">First Name:*</label>
                                                <input name="first_name" class="form-control" id="first_name" type="text"
                                                    placeholder="Enter First Name">
                                            </div>

                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input name="last_name" class="form-control" id="last_name" type="test"
                                                    placeholder="Last Name">
                                            </div>

                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">

                                                <label for="email">Email:*</label>

                                                <input  name="email" id="email" type="email" class="form-control"autofocus
                                                    placeholder="Email">
                                            </div>

                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">
                                                <label for="password">Password:*</label>
                                                <input name="password" class="form-control"  type="password"
                                                    placeholder="Password">
                                            </div>

                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <div class="form-group">
                                                <label for="address">Address:*</label>
                                                <input name="address" class="form-control" type="text"
                                                    placeholder="Address" >
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
            </div>

    </main>
    </x-layouts.base>
