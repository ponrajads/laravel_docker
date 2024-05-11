@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Edit Coach Details <a class="btn btn-sm btn-pending-soft w-24 float-right">Go Back</a>
    </h2>
    @foreach($users as $users)
    <form action="{{ route('coach/updatecoach') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="hidden_user_id" name="hidden_user_id" value="{{$users->user_id}}">
        <hr class="my-4">
        <div class="grid grid-cols-6 gap-1 mt-5">
            <div class="col-span-12 flex items-center h-10">
                <h2 class="text-xl font-bold truncate text-pending">
                    Personal Information :
                </h2>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">First Name</div>
                        </div>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" class="form-control" readonly value="{{old('first_name',$users->first_name)}}" >
                    </div>
                    </div>
                </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Last Name</div>
                        </div>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" class="form-control" readonly value="{{old('last_name', $users->last_name)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Date of Birth</div>
                        </div>
                        @php
                            $dobdate = date("Y-m-d", strtotime($users->dob));
                        @endphp
                        <input type="date" id="dob" name="dob" placeholder="Enter Date of Birth" class="form-control"
                            @if(!empty($users->dob))
                                readonly
                            @else
                                required
                            @endif
                            value="{{$dobdate}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Gender</div>
                        </div>
                        <input type="text" id="gender" name="gender" placeholder="Enter Gender" class="form-control" readonly value="{{old('gender',$users->gender)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Phone</div>
                        </div>
                        <input type="text" id="mobile" name="mobile" placeholder="Enter Phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            @if(!empty($users->mobile))
                                readonly
                            @else
                                required
                            @endif
                            value="{{old('mobile',$users->mobile)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Father/Guardian Name</div>
                        </div>
                        <input type="text" id="father_name" name="father_name" placeholder="Enter Father/Guardian Name" class="form-control" required value="{{old('father_name',$users->father_name)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Pan Number</div>
                        </div>
                        <input type="text" id="pan" name="pan" placeholder="Enter Pan Number"  class="form-control" required value="{{old('pan',$users->pan)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Aadhar No</div>
                        </div>
                        <input type="text" id="aadhar" name="aadhar" placeholder="Enter Aadhar No" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            @if(!empty($users->aadhar))
                                readonly
                            @else
                                required
                            @endif
                            value="{{old('aadhar', $users->aadhar)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Blood Group</div>
                        </div>
                        <?php $blood = \App\Models\MBloodGroup::where('id', $users->blood_group)->first(); ?>
                        <select class="form-select mt-0 sm:mr-2" name="blood_group" aria-label="Default select example" id="bloodGroup">
                            <option selected disabled>Select Your Blood Group</option>
                            <option value="1" @if($users->blood_group == 1) selected @endif>A negative (A-)</option>
                            <option value="2" @if($users->blood_group == 2) selected @endif>A positive (A+)</option>
                            <option value="3" @if($users->blood_group == 3) selected @endif>AB negative (AB-)</option>
                            <option value="4" @if($users->blood_group == 4) selected @endif>AB positive (AB+)</option>
                            <option value="5" @if($users->blood_group == 5) selected @endif>B negative (B-)</option>
                            <option value="6" @if($users->blood_group == 6) selected @endif>B positive (B+)</option>
                            <option value="7" @if($users->blood_group == 7) selected @endif>O negative (O-)</option>
                            <option value="8" @if($users->blood_group == 8) selected @endif>O positive (O+)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <hr class="mt-4 mb-3">
            </div>
            <div class="col-span-12 flex items-center h-10">
                <h2 class="text-xl font-bold truncate text-pending">
                    Permanent Address :
                </h2>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Address Line 1</div>
                        </div>
                        <input type="text" id="address1" name="address1" placeholder="Enter Address" class="form-control" required value="{{old('address1',$users->address1)}}" >
                    </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">Address Line 2</div>
                            </div>
                            <input type="text" id="address2" name="address2" placeholder="Enter Address" class="form-control" required value="{{old('address2', $users->address2)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">City</div>
                            </div>
                            <input type="text" id="city" name="city" placeholder="Enter City" class="form-control" required value="{{old('city', $users->city)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">State</div>
                            </div>
                            <input type="text" id="state" name="state" placeholder="Enter State" class="form-control" required value="{{old('state', $users->state)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">District</div>
                            </div>
                            <input type="text" id="district" name="district" placeholder="Enter District" class="form-control" required value="{{old('district', $users->district)}}" >
                        </div>
                    </div>
                </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Pincode</div>
                        </div>
                        <input type="text" id="pincode" name="pincode" placeholder="Enter Pincode" class="form-control"oninput="this.value = this.value.replace(/[^0-9]/g, '')"  required value="{{ old('pincode',$users->pincode)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-12 flex items-center h-10">
                <h2 class="text-xl font-bold truncate text-pending">
                    Communication Address :
                </h2>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Address Line 1</div>
                        </div>
                        <input type="text" id="caddress1" name="caddress1" placeholder="Enter Address" class="form-control" required value="{{old('caddress1',$users->caddress1)}}" >
                    </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">Address Line 2</div>
                            </div>
                            <input type="text" id="caddress2" name="caddress2" placeholder="Enter Address" class="form-control" required value="{{ old('caddress2',$users->caddress2)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">City</div>
                            </div>
                            <input type="text" id="ccity" name="ccity" placeholder="Enter City" class="form-control" required value="{{ old('ccity',$users->ccity)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">State</div>
                            </div>
                            <input type="text" id="cstate" name="cstate" placeholder="Enter State" class="form-control" required value="{{old('cstate', $users->cstate)}}" >
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                    <div class="intro-x">
                        <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                            <div class="text-start w-1/4">
                                <div class="font-medium">District</div>
                            </div>
                            <input type="text" id="cdistrict" name="cdistrict" placeholder="Enter District" class="form-control" required value="{{old('cdistrict', $users->cdistrict)}}" >
                        </div>
                    </div>
                </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Pincode</div>
                        </div>
                        <input type="text" id="cpincode" name="cpincode" placeholder="Enter Pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" required value="{{old('cpincode', $users->cpincode)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <hr class="mt-4 mb-2">
            </div>
            <div class="col-span-12 flex items-center h-10">
                <h2 class="text-xl font-bold truncate text-pending">
                    Bank Details :
                </h2>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Bank Name</div>
                        </div>
                        @php
                            $banks = \App\Models\Mbank::all();
                        @endphp
                        <select name="bank_name" id="bank_name" style="width: 100%; height: 40px;" required>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}" @if($bank->id == $users->bank_name) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Branch</div>
                        </div>
                        <input type="text" id="bank_branch" name="bank_branch" placeholder="Enter Branch" class="form-control" required value="{{ old('bank_branch',$users->bank_branch)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Account Number</div>
                        </div>
                        <input type="text" id="account_no" name="account_no" placeholder="Enter Account Number" class="form-control" required value="{{old('account_no', $users->account_no)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-6 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">IFSC Code</div>
                        </div>
                        <input type="text" id="ifsc_code" name="ifsc_code" placeholder="Enter IFSC Code" class="form-control" required value="{{ old('ifsc_code',$users->ifsc_code)}}" >
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <hr class="mt-4 mb-2">
            </div>
            @if (empty($users->photo) || empty($users->dob_proof) || empty($users->address_proof))
            <div class="col-span-12 flex items-center h-10">
                <h2 class="text-xl font-bold truncate text-pending">
                    File Uploads :
                </h2>
            </div>
            <div class="col-span-6 md:col-span-4 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 items-center zoom-in">
                        <div class="text-center ">
                            <div class="font-medium">Photograph</div>
                        </div>
                        <div class="mt-4">
                            <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('BFI/photo/' . $users->photo) }}">
                        </div>
                        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, application/pdf">
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-4 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 items-center zoom-in">
                        <div class="text-center">
                            <div class="font-medium">DOB Proof</div>
                        </div>
                        <div class="mt-4">
                            <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('BFI/dob_proof/' . $users->dob_proof) }}">
                        </div>
                        <input type="file" id="dob_proof" name="dob_proof" accept="image/png, image/jpeg, application/pdf">
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-4 2xl:col-span-6">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 items-center zoom-in">
                        <div class="text-center">
                            <div class="font-medium">Address Proof</div>
                        </div>
                        <div class="mt-4">
                            <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('BFI/address_proof/' . $users->address_proof) }}">

                        </div>
                        <input type="file" id="address_proof" name="address_proof" accept="image/png, image/jpeg, application/pdf">
                    </div>
                </div>
            </div>
            <div class="col-span-12">
                <hr class="mt-4 mb-3">
            </div>
            @endif
        <div class="col-span-12 flex items-center justify-center">
            <button type="submit" class="w-32 focus:outline-none border border-transparent py-2 px-5 shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Submit</button>
        </div>
    </form>
    @endforeach

<!-- END: Content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

     var baseUrl = {!! json_encode(url('/')) !!}
     function approveUser(userId) {
        // Add your AJAX logic here
        console.log('Approve button clicked for user ID:', userId);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Example: Send an AJAX request
        $.ajax({
            url: baseUrl + "/admin/player/approve/" + userId,
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);
                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been approved successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
    // Check if the user clicked "OK"
    if (result.isConfirmed) {
        // Reload the page
        location.reload();
    }
});
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    });
                }
                // Optionally, you can update the UI or perform other actions here
            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }

            // Optionally, you can close the modal here if needed
            // $('#approve-modal').modal('hide');
        });
    }
    </script>
    <script>
    function rejectUser(userId) {
        var selectedReason = document.getElementById('rejectReason').value;

        // Make AJAX request
        $.ajax({
            url: baseUrl + "/admin/player/reject/"+userId+"/"+selectedReason, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been rejected successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
    // Check if the user clicked "OK"
    if (result.isConfirmed) {
        // Reload the page
        location.reload();
    }
});
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    });
                }

                // Optionally, you can update the UI or perform other actions here
            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }
        });
    }
</script>
<script>
    function blockUser(userId) {

        // Make AJAX request
        $.ajax({
            url: baseUrl + "/admin/player/block/"+userId, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been blocked successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
    // Check if the user clicked "OK"
    if (result.isConfirmed) {
        // Reload the page
        location.reload();
    }
});
                }else{
                    Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    });
                }

                // Optionally, you can update the UI or perform other actions here
            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }
        });
    }
</script>
@endsection
