@extends('layouts.app')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row mb-6 gy-6">

            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add ({{ ucfirst($type) }})</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add_user', $type) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="fullname">Full Name <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="fullname2" class="input-group-text"><i
                                                    class="icon-base ti tabler-user"></i></span>
                                            <input type="text" class="form-control" id="fullname" name="fullname"
                                                placeholder="John Doe" aria-label="John Doe" required
                                                value="{{ old('fullname') }}" aria-describedby="fullname2" />
                                        </div>
                                        @error('fullname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="email">Email<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="icon-base ti tabler-mail"></i></span>
                                            <input type="text" id="email" name="email" class="form-control"
                                                placeholder="john.doe@gmail.com" aria-label="john.doe@gmail.com"
                                                aria-describedby="email2" required value="{{ old('email') }}" />
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="phone">Phone No.<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="phone2" class="input-group-text"><i
                                                    class="icon-base ti tabler-phone"></i></span>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control phone-mask" placeholder="9865474584"
                                                aria-label="9865474584" aria-describedby="phone2" required
                                                value="{{ old('phone') }}" />
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="father_name">Father Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="father_name2" class="input-group-text"><i
                                                    class="icon-base ti tabler-user"></i></span>
                                            <input type="text" class="form-control" id="father_name" name="father_name"
                                                value="{{ old('father_name') }}" placeholder="John Doe"
                                                aria-label="John Doe" aria-describedby="father_name2" />
                                        </div>
                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="mother_name">Mother Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="mother_name2" class="input-group-text"><i
                                                    class="icon-base ti tabler-user"></i></span>
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                placeholder="John Doe" aria-label="John Doe"
                                                value="{{ old('mother_name') }}" aria-describedby="mother_name2" />
                                        </div>
                                        @error('mother_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="password">Password<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="password2" class="input-group-text"><i
                                                    class="icon-base ti tabler-lock"></i></span>
                                            <input type="text" class="form-control" id="password" name="password"
                                                required placeholder="*******" aria-label="*******"
                                                aria-describedby="password2" />
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="dob">DOB<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="dob2" class="input-group-text"><i
                                                    class="icon-base ti tabler-calendar"></i></span>
                                            <input class="form-control" type="date" value="{{ old('dob') }}"
                                                id="flatpickr-date" name="dob" required />
                                        </div>
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="gender" class="form-label">Gender<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="gender" name="gender"
                                            aria-label="Select Gender" required>
                                            <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                                            <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                                            <option value="Other" @selected(old('gender') == 'Other')>Other</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="profile_image" class="form-label">Profile Image</label>
                                        <input class="form-control" type="file" id="profile_image"
                                            name="profile_image" accept="image/*" />
                                    </div>
                                    @error('profile_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Address Details</h5>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="country" class="form-label">Country<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="country" name="country"
                                            onchange="getStates(this.value)" aria-label="Select Country" required>
                                            <option value="" selected>Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @selected(old('country') == $country->id)>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="state" class="form-label">State<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="state" name="state" required
                                            onchange="getCities(this.value)" aria-label="Select State">
                                            <option value="">Select State</option>

                                        </select>
                                    </div>
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="city" class="form-label">City<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="city" name="city"
                                            aria-label="Select City" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="zipcode">Zip Code<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="zipcode2" class="input-group-text"><i
                                                    class="icon-base ti tabler-location"></i></span>
                                            <input type="text" id="zipcode" name="zipcode"
                                                class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                                aria-describedby="zipcode2" required value="{{ old('zipcode') }}" />
                                        </div>
                                        @error('zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-6">
                                        <label class="form-label" for="address">Address<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <textarea id="address" name="address" class="form-control" placeholder="Address" aria-label="Address"
                                                aria-describedby="address2">{{ old('address') }}</textarea>
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Banks Details</h5>
                                </div>


                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label for="bank" class="form-label">Bank<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="bank" name="bank"
                                            aria-label="Select Bank" required>
                                            <option value="" selected>Select Bank</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}" @selected(old('bank') == $bank->id)>
                                                    {{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('bank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="name_at_bank">Name at Bank<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="name_at_bank2" class="input-group-text"><i
                                                    class="icon-base ti tabler-user"></i></span>
                                            <input type="text" id="name_at_bank" name="name_at_bank" class="form-control"
                                                placeholder="John Doe" aria-label="John Doe" required
                                                value="{{ old('name_at_bank') }}" />
                                        </div>
                                        @error('name_at_bank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="account_number">Account Number</label>
                                        <div class="input-group input-group-merge">
                                            <span id="account_number2" class="input-group-text"><i
                                                    class="icon-base ti tabler-wallet"></i></span>
                                            <input type="text" id="account_number" name="account_number"
                                                class="form-control phone-mask" placeholder="123456789"
                                                aria-label="123456789" aria-describedby="account_number2"
                                                value="{{ old('account_number') }}" required />
                                        </div>
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="mb-6">
                                        <label class="form-label" for="ifsc">IFSC Code</label>
                                        <div class="input-group input-group-merge">
                                            <span id="ifsc2" class="input-group-text"><i
                                                    class="icon-base ti tabler-wallet"></i></span>
                                            <input type="text" id="ifsc" name="ifsc"
                                                class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                                aria-describedby="ifsc2" required value="{{ old('ifsc') }}" />

                                        </div>
                                        @error('ifsc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">KYC Details</h5>
                                </div>

                                <div class="col-sm-4">
                                    <div class="mb-6">
                                        <label for="proof_type" class="form-label">Proof Type<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="proof_type" name="proof_type"
                                            aria-label="Select Proof Type" required>
                                            <option value="" selected>Select Proof Type</option>
                                            <option value="Adhaar Card" @selected(old('proof_type') == 'Adhaar Card')>Adhaar Card</option>
                                            <option value="Permanent Account Number (PAN)" @selected(old('proof_type') == 'Permanent Account Number (PAN)')>
                                                Permanent Account Number (PAN)</option>
                                            <option value="Election Commission Id Card" @selected(old('proof_type') == 'Election Commission Id Card')>
                                                Election Commission Id Card</option>
                                            <option value="Driver's License" @selected(old('proof_type') == 'Driver\'s License')>Driver's License
                                            </option>
                                            <option value="Birth Certificate" @selected(old('proof_type') == 'Birth Certificate')>Birth
                                                Certificate</option>
                                            <option value="State-issued Identification Card" @selected(old('proof_type') == 'State-issued Identification Card')>
                                                State-issued Identification Card</option>
                                            <option value="Student Identification Card" @selected(old('proof_type') == 'Student Identification Card')>
                                                Student Identification Card</option>
                                            <option value="Social Security Card" @selected(old('proof_type') == 'Social Security Card')>Social
                                                Security Card</option>
                                            <option value="Military Identification Card" @selected(old('proof_type') == 'Military Identification Card')>
                                                Military Identification Card</option>
                                            <option value="Passport Card" @selected(old('proof_type') == 'Passport Card')>Passport Card
                                            </option>

                                        </select>
                                    </div>
                                    @error('proof_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-sm-4">
                                    <div class="mb-6">
                                        <label class="form-label" for="identification_number">Identification
                                            Number<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span id="identification_number2" class="input-group-text"><i
                                                    class="icon-base ti tabler-wallet"></i></span>
                                            <input type="text" id="identification_number" name="identification_number"
                                                class="form-control phone-mask" placeholder="123456" aria-label="123456"
                                                aria-describedby="identification_number2" required
                                                value="{{ old('identification_number') }}" />

                                        </div>
                                        @error('identification_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                  <div class="col-sm-4">
                                    <div class="mb-6">
                                        <label for="identification_image" class="form-label">Identification Image<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="file" id="identification_image"
                                            name="identification_image" accept="image/*" required/>
                                    </div>
                                    @error('identification_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!--/ Content -->

    @if($errors->any())
    <script>
        $(document).ready(function(){
            getStates('{{old("country")}}','{{old("state")}}')
            getCities('{{old("state")}}','{{old("city")}}')
        });
    </script>
    @endif
@endsection
