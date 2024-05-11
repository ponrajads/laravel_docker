@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        List of All Tournaments <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{route('admin/dashboard')}}" style="margin-left: 10px">Back to Home</a>
        <a class="btn btn-sm btn-pending-soft w-30 float-right" href="{{route('admin/addtournaments')}}">Add new Tournament</a>
    </h2>
    <div class="grid grid-cols-12 gap-4 mt-5">

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="players-table">
                <thead>
                <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">Tournament Name</th>
                        <th class="text-start whitespace-nowrap">Location</th>
                        <th class="text-start whitespace-nowrap">Entry Last Date</th>
                        <th class="text-start whitespace-nowrap">Start Date</th>
                        <th class="text-start whitespace-nowrap">End Date</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($tournaments as $key => $value)
                    <tr class="intro-x">
                        <td class="w-40">
                            <span class="font-medium whitespace-nowrap">{{ $counter }}</span>
                        </td>
                        <td>
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_name }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_location }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ date("d-m-Y", strtotime($value->entry_last_date)) }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ date("d-m-Y", strtotime($value->tournament_start_date)) }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ date("d-m-Y", strtotime($value->tournament_end_date)) }}</span>
                        </td>
                        <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                                <a class="flex items-center text-info mr-2 text-xs" href="{{route('admin/tournament', $value->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-3 h-3 mr-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> View </a>
                                <a class="flex items-center text-warning mr-2 text-xs" href="{{route('admin/tournament/viewentry', $value->id)}}"><i data-lucide="users" class="w-3 h-3 mr-1"></i> View Teams </a>
                                <a class="flex items-center text-success mr-2 text-xs" href="{{route('admin/tournament/edit', $value->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit w-3 h-3 mr-1"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit </a>
                                <!-- <a class="flex items-center text-pending mr-2 text-xs" href="{{route('admin/createteam', $value->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus-circle" data-lucide="plus-circle" class="lucide lucide-plus-circle w-3 h-3 mr-1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Team </a> -->
                                <a class="flex items-center text-danger text-xs" href="#" data-id="{{ $value->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-3 h-3 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
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
