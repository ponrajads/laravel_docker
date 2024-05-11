@extends('layouts.player.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-2xl font-bold truncate text-primary mt-10">
        All Certificates
    </h2>
    <hr class="mt-3">
    <div class="grid grid-cols-12 gap-6 mt-5">  
        <div class="col-span-12 mt-0">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-xl font-bold truncate mr-5 text-pending">
                    Tournament Lists
                </h2>
                <!--<div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                    <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                    <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                </div>-->
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2">
                    <thead>
                        <tr>
                            <th class="text-center whitespace-nowrap">S.No</th>
                            <th class="whitespace-nowrap">Tournament</th>
                            <th class="text-center whitespace-nowrap">Location</th>
                            <th class="text-center whitespace-nowrap">Tournament Date</th>
                            <th class="text-center whitespace-nowrap">Certificates</th>
                        </tr>
                    </thead>
                    <tbody>
				  <?php $i = 1; ?>
                        @foreach($entry as $entries)
						@if($entries->certificate != '')
                        <tr class="intro-x">
                            <td class="w-10">
                                <div class="text-center">
								{{$i++}}
                                </div>
                            </td>
                            <td>
                                <a href="#" class="font-medium whitespace-nowrap">{{$entries->tournament_name}}</a> 
                            </td>
                            <td class="text-center">{{$entries->tournament_location}}</td>
                            <td class="text-center">{{date("d-m-Y",strtotime($entries->tournament_start_date))}} - {{date("d-m-Y",strtotime($entries->tournament_end_date))}}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-danger" href="{{ Storage::disk('s3')->url('BFI/certificates/' . $entries->certificate) }}" download> <i data-lucide="download" class="w-4 h-4 mr-1"></i> Download</a>
                                </div>
                            </td>
                        </tr>
						@endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
 </div>
<!-- END: Content -->


<!-- BEGIN: Approve Modal -->
<div id="generate-certificate" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <img src="../dist/images/certificate.jpg" alt="player certificate">
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24 mr-1">Close</button>
                    <button type="button" data-tw-dismiss="modal"  class="btn btn-success text-white w-24">Download</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Approve Modal -->

@endsection