@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        List of Blocked Coaches <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{route('state/dashboard')}}">Back to Home</a>
    </h2>
    <div class="grid grid-cols-12 gap-4 mt-5">
        
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="players-table">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">Player</th>
                        <th class="text-start whitespace-nowrap">Email</th>
                        <th class="text-start whitespace-nowrap">Username</th>
                        <th class="text-start whitespace-nowrap">Phone</th>
                        <th class="text-center whitespace-nowrap">IRFU Status</th>
                        <th class="text-center whitespace-nowrap">State Verify</th>
                        <th class="text-center whitespace-nowrap">Registered Date</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($users as $players)
                    <tr class="intro-x">
                        <td class="w-10 text-center">
                            {{$i++}}
                        </td>
                        <td>
                            <div class="text-slate-500 text-xs whitespace-nowrap">{{$players->name}}</div>
                        </td>
                        <td class="text-start text-xs">{{$players->email}}</td>
                        <td class="text-start text-xs">{{$players->username}}</td>
                        <td class="text-start text-xs">+91 {{$players->mobile}}</td>
                        <td class="">
                            @if($players->userstatus == 1)
                            <div class="flex items-center justify-center text-success text-xs"> 
                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Approved 
                            </div>
                            @elseif($players->userstatus == 0)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Pending 
                            </div>
                            @elseif($players->userstatus == 2)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Rejected 
                            </div>
                            @elseif($players->userstatus == 3)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Blocked 
                            </div>
                            @elseif($players->userstatus == 4)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Hold 
                            </div>
                            @endif
                        </td>
                        <td class="">
                            @if($players->stateverify == 1)
                            <div class="flex items-center justify-center text-success text-xs"> 
                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Approved 
                            </div>
                            @elseif($players->stateverify == 0)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Pending 
                            </div>
                            @elseif($players->stateverify == 2)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Rejected 
                            </div>
                            @elseif($players->stateverify == 3)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Blocked 
                            </div>
                            @elseif($players->stateverify == 4)
                            <div class="flex items-center justify-center text-danger text-xs"> 
                                <i data-lucide="x-square" class="w-4 h-4 mr-2"></i> Hold 
                            </div>
                            @endif
                        </td>
                        <td class="text-start text-xs text-center">{{date("d-m-Y", strtotime($players->created_at))}}</td>
                        <td class="table-report__action">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-2 text-xs" href="{{route('state/coach', $players->user_id)}}"> <i data-lucide="eye" class="w-3 h-3 mr-1"></i> View </a>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        
    </div>
   
</div>
<!-- END: Content -->
<!-- SweetAlert CDN link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Your existing scripts -->
<script>
    // Wait for the document to be ready
    document.addEventListener('DOMContentLoaded', function () {
        // Select all elements with the delete-btn class
        var deleteButtons = document.querySelectorAll('.delete-btn');

        // Loop through each delete button
        deleteButtons.forEach(function (button) {
            // Attach a click event listener
            button.addEventListener('click', function (event) {
                // Prevent the default link behavior
                event.preventDefault();

                // Get the category ID from the data-id attribute
                var categoryId = button.getAttribute('data-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // If the user clicks "Yes," proceed with the deletion
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('admin/coach/delete') }}" + '/' + categoryId;
                    }
                });
            });
        });
    });
</script>
@endsection