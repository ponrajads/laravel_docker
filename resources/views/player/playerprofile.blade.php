@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->

<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Player Details <a class="btn btn-sm btn-pending-soft w-24 float-right">Go Back</a>
    </h2>
    <hr class="my-4">
    <div class="grid grid-cols-12 gap-1 mt-5">
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Personal Information :
            </h2>
        </div>
        @foreach($users as $users)
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">First Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->first_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Last Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->last_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Date of Birth</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{date("d-m-Y",strtotime($users->dob))}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Gender</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->gender}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->email}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Phone</div>
                    </div>
                    <div class="text-slate-500 playervalue">+91 {{$users->mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Father/Guardian Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->father_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Father/Guardian Mobile Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->father_mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Aadhar No</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->aadhar}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Blood Group</div>
                    </div>
                    @if($users->blood_group == '')
                    <div class="text-slate-500 playervalue">N/A</div>
                    @else
                    <?php $blood = \App\Models\MBloodGroup::where('id',$users->blood_group)->first();?>
                    <div class="text-slate-500 playervalue">{{$blood->name}}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <h2 class="text-xl font-bold truncate text-pending h-10">
            Permanent Address :
            </h2>
            <div class="intro-x">
                <div class="box px-5 py-3 mb-1 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Address</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->address}}</div>
                </div>
            </div>

            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Pincode / Zipcode</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->pincode}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <h2 class="text-xl font-bold truncate text-pending h-10">
            Communication Address :
            </h2>
            <div class="intro-x">
                <div class="box px-5 py-3 mb-1 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Address</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->caddress}}</div>
                </div>
            </div>

            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Pincode / Zipcode</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->cpincode}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <hr class="mt-4 mb-2">
        </div>
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Association Details :
            </h2>
        </div>
        {{-- <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Association Name</div>
                    </div>
                    <?php $association = \App\Models\MAssociation::where('id',$users->association)->first();?>
                    <div class="text-slate-500 playervalue">{{$association->name}}</div>
                </div>
            </div>
        </div> --}}
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Associated Club/District                        </div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->associated_club}}</div>
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
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Bank Name</div>
                    </div>
                    @if($users->bank_name == '')
                    <div class="text-slate-500 playervalue">-</div>
                    @else
                    <?php $bank = \App\Models\Mbank::where('id',$users->bank_name)->first();?>
                    @if(isset($bank) || !empty($bank))
                    <div class="text-slate-500 playervalue">{{$bank->name}}</div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Branch</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->bank_branch}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Account Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->bank_account}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">IFSC Code</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->bank_ifsc}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <hr class="mt-4 mb-2">
        </div>
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                File Uploads :
            </h2>
        </div>

        <div class="col-span-4 md:col-span-4 2xl:col-span-4">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 items-center zoom-in">
                    <div class="text-center ">
                        <div class="font-medium">Photograph</div>
                    </div>
                    <div class="mt-4">

                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/photo/' . $users->photo) }}"style="width: 200px;height: 200px;cursor: pointer;">

                    </div>
                    <div class="flex space-between mt-4">
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="eye" class="w-3 h-3 mr-1"></i> View</button>
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="download" class="w-3 h-3 mr-1"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-4 md:col-span-4 2xl:col-span-4">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 items-center zoom-in">
                    <div class="text-center">
                        <div class="font-medium">DOB Proof</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/dob_proof/' . $users->dob_proof) }}"style="width: 200px;height: 200px;cursor: pointer;">

                    </div>
                    <div class="flex space-between mt-4">
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="eye" class="w-3 h-3 mr-1"></i> View</button>
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="download" class="w-3 h-3 mr-1"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-4 md:col-span-4 2xl:col-span-4">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 items-center zoom-in">
                    <div class="text-center">
                        <div class="font-medium">Address Proof</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/address_proof/' . $users->address_proof) }}"style="width: 200px;height: 200px;cursor: pointer;">

                    </div>
                    <div class="flex space-between mt-4">
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="eye" class="w-3 h-3 mr-1"></i> View</button>
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="download" class="w-3 h-3 mr-1"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-8 mb-2">
    <div id="icon-button" class="py-5">
        <div class="preview">
            <div class="flex flex-wrap justify-end">
                <a href="{{route('player/dashboard')}}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Back </a>
                <a href="{{ route('player/editplayerdetails') }}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Edit</a>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

<!-- BEGIN: Approve Modal -->

<!-- END: Block Modal -->

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
@endforeach

@endsection
