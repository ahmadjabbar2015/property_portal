

    <title>crossdevlogix - Profile</title>
    <div>

        <div class="row">
            <div class="col-12 col-xl-8">
                @if ($showSavedAlert)
                <div class="alert alert-success" role="alert">
                    Saved!
                </div>
                @endif
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">General information</h2>
                    <form wire:submit.prevent="save" action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input wire:model="user.first_name" class="form-control" id="first_name" type="text"
                                        placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input wire:model="user.last_name" class="form-control" id="last_name" type="text"
                                        placeholder="Also your last name">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input wire:model="user.email" class="form-control" id="email" type="email"
                                        placeholder="name@company.com" disabled>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender">Gender</label>
                                <select wire:model="user.gender" class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Choose...</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('user.gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <h2 class="h5 my-4">Location</h2>
                        <div class="row">
                            <div class="col-sm-9 mb-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input wire:model="user.address" class="form-control" id="address" type="text"
                                        placeholder="Enter your home address">
                                </div>
                                @error('user.address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input wire:model="user.number" class="form-control" id="number" type="number"
                                        placeholder="No.">
                                </div>
                                @error('user.number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input wire:model="user.city" class="form-control" id="city" type="text"
                                        placeholder="City">
                                </div>
                                @error('user.city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="zip">ZIP</label>
                                    <input wire:model="user.ZIP" class="form-control" id="zip" type="tel"
                                        placeholder="ZIP">
                                </div>
                            </div>
                            @error('user.ZIP')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card shadow border-0 text-center p-0">
                            <div wire:ignore.self class="profile-cover rounded-top"
                                data-background="../assets/img/DEVLOGIX-PMS.png" width="50" height="50">
                            </div>
                            <div class="card-body pb-5">
                                <img src="../assets/img/devlogix-picture-1.png"
                                    class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                                <h4 class="h3">
                                    {{ auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name' }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
