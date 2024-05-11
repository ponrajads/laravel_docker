@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        District Details <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{route('admin/alldistricts')}}">Go Back</a>
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
                        <div class="font-medium">District Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->district_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Association Name</div>
                    </div>
                    <?php $association = \App\Models\MAssociation::where('id',$users->association)->first();?>
                    <div class="text-slate-500 playervalue">{{$association->name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Short Code</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->short_code}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Date of Incorporation</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{date("d-m-Y",strtotime($users->date_of_incorporation))}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Last Election Held On</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->last_election}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">President Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->president_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">President Mobile Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">+91 {{$users->mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">President Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->email}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Secretary Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->secretary_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Secretary Mobile Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->secretary_mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Secretary Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->secemail}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Treasurer Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->treasurer_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Treasurer Mobile Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->treasurer_mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Treasurer Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->treasurer_email}}</div>
                </div>
            </div>
        </div>

        <div class="col-span-12">
            <hr class="mt-4 mb-3">
        </div>

        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Communication Address :
            </h2>
        </div>
		<div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Registered Office Address Line 1</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->register_address1}}</div>
                </div>
            </div>
        </div>
		<div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Registered Office Address Line 2</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->register_address2}}</div>
                </div>
            </div>
        </div>

		<div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">District</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->district}}</div>
                </div>
            </div>
        </div>
			<div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">City</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->city}}</div>
                </div>
            </div>
        </div>
           <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Country</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->country}}</div>
                </div>
            </div>
        </div>
		<div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Pincode / Zipcode</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->pincode}}</div>
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
        <div class="col-span-12 md:col-span-4 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 items-center zoom-in">
                    <div class="text-center ">
                        <div class="font-medium">Association Logo</div>
                    </div>
                    <div class="mt-4">

                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/association_logo/' . $users->association_logo) }}">

                    </div>
                    <div class="flex space-between mt-4">
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="eye" class="w-3 h-3 mr-1"></i> View</button>
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="download" class="w-3 h-3 mr-1"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-4 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 items-center zoom-in">
                    <div class="text-center">
                        <div class="font-medium">State Association Certificate</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/certificate_state/' . $users->certificate_state) }}">

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
                <a href="{{route('district/dashboard')}}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Back </a>
                {{-- <a href="{{ route('coach/editcoachdetails') }}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Edit</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

<!-- BEGIN: Approve Modal -->
<div id="approve-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="user-check" class="w-16 h-16 text-success mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to approve this coach?
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" id="approve-button" data-tw-dismiss="modal" class="btn btn-success text-white w-24"
    onclick="approveUser('{{ $users->user_id }}')">Approve</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Approve Modal -->

<!-- BEGIN: Reject Modal -->
<div id="reject-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="thumbs-down" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to reject this coach?
                        <br>
                        This process cannot be undone.
                    </div>
                    <div class="text-left mt-4">
                        <label class="text-danger">Please Select the Reason.</label>
                        <div class="mt-2">
                            <select id="rejectReason" data-placeholder="Select the Reason" class="tom-select w-full">
                                <option value="Photograph is not Clear">Photograph is not Clear</option>
                                <option value="DOB was mismatched">DOB was mismatched</option>
                                <option value="Address was mismatched">Address was mismatched / Wrong Address</option>
                                <option value="Duplicate Entry">Duplicate Entry</option>
                                <option value="Address Proof or DOB proof not Submitted">Address Proof / DOB proof not Submitted</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="rejectUser('{{ $users->user_id }}')">Reject</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- END: Reject Modal -->


<!-- BEGIN: Block Modal -->
<div id="block-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-primary mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to block this coach?
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24" onclick="blockUser('{{ $users->user_id }}')">Block</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
            url: baseUrl + "/admin/district/approve/"+userId,
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);
                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'District has been approved successfully.',
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
            url: baseUrl + "/admin/district/reject/"+userId+"/"+selectedReason, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'District has been rejected successfully.',
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
            url: baseUrl + "/admin/district/block/"+userId, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'District has been blocked successfully.',
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
