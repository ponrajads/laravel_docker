@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        List of All Team Entries <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{ route('admin/tournamentlist') }}" style="margin-left: 10px">Go Back</a>
        
    </h2>
    <h3 class="text-xl font-bold truncate text-primary mt-2 text-center" style="font-size: 25px">{{ $tournament->tournament_name}}</h3>
    <div class="grid grid-cols-12 gap-4 mt-5">
        
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="players-table">
                <thead>
                <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">State Name</th>
                        <th class="text-start whitespace-nowrap">Acknowledgement</th>
                        <th class="text-start whitespace-nowrap">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($tourentry as $key => $value)
                    <tr class="intro-x">
                        <td class="w-40">
                            <span class="font-medium whitespace-nowrap">{{ $counter }}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{ $value->stateName }}</span>
                        </td>
                        <td class="text-start">
                            <a href="{{Storage::disk('s3')->url('BFI/acknowledge/'.$value->acknowledge)}}" class="btn btn-sm btn-primary" target="_blank">Download Acknowledge</a>
                           
                        </td>
                       
                        <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                                <a class="flex items-center text-info mr-2 text-xs" href="{{route('admin/tournament/entryview', [$value->tourid, $value->state_id])}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-3 h-3 mr-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> View Details</a>
                                
                            </div>
                        </td>
                    </tr>
                    <?php $counter++; ?>
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
                        window.location.href = "{{ url('admin/user/delete') }}" + '/' + categoryId;
                    }
                });
            });
        });
    });
</script>
@endsection