@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Academys Details <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{route('admin/allplayers')}}">Go Back</a>
    </h2>
    @foreach($users as $users)
    <hr class="my-4">
    <div class="grid grid-cols-12 gap-1 mt-5">
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Personal Information :
            </h2>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Academy/Club Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->acadmey_name}}</div>
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
                        <div class="font-medium">Registration Certificate</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->registered_certificate}}</div>
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
                        <div class="font-medium">Pan No</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->pan_no}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Regular Place of Practice</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->practice_place}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Number of Rugby Players Associated</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->number_of_players}}</div>
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
                            <div class="font-medium">Address1</div>
                        </div>
                        <div class="text-slate-500 playervalue">{{$users->caddress1}}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">Address2</div>
                        </div>
                        <div class="text-slate-500 playervalue">{{$users->caddress2}}</div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">District</div>
                        </div>
                        <div class="text-slate-500 playervalue">{{$users->cdistrict}}</div>
                    </div>
                </div>
            </div>
                <div class="col-span-12 md:col-span-6 2xl:col-span-12">
                <div class="intro-x">
                    <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                        <div class="text-start w-1/4">
                            <div class="font-medium">City</div>
                        </div>
                        <div class="text-slate-500 playervalue">{{$users->ccity}}</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 2xl:col-span-12">
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
                Club/Academy Details :
            </h2>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Club/Academy Director</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->club_director}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Head/Director Mobil</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->club_mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Head/Director Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->club_email}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Head/Director Aadhar No</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$users->club_aadhar}}</div>
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
                        <div class="font-medium">Photograph</div>
                    </div>
                    <div class="mt-4">

                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/photo/' . $users->photo) }}">

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
                        <div class="font-medium">Academey Aadhar Proof</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/academey_aadhar/' . $users->academey_aadhar) }}">

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
                        <div class="font-medium">Academey logo</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/academey_logo/' . $users->academey_logo) }}">

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
                        <div class="font-medium">Academey Photo</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" src="{{ Storage::disk('s3')->url('IRFU/academey_photo/' . $users->academey_photo) }}">

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
                <a href="{{route('club/dashboard')}}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Back </a>
                <a href="{{ route('club/editclubdetails') }}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Edit</a>
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
            url: baseUrl + "/admin/club/approve/" + userId,
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);
                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Academy has been approved successfully.',
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
            url: baseUrl + "/admin/club/reject/"+userId+"/"+selectedReason, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Academy has been rejected successfully.',
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
            url: baseUrl + "/admin/club/block/"+userId, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Academy has been blocked successfully.',
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
