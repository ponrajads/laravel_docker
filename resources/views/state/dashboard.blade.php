@extends('layouts.state.dashboard.header')
@section('content')
<!-- BEGIN: Content -->
<div class="content dashboard">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Player Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-2xl font-bold truncate text-primary mr-5">
                            State Association
                        </h2>                       
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">No of Players</div>
                                <div class="text-2xl leading-4 text-bold mt-3">{{$playercount}}</div>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">No of Districts</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">-</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">No of Coaches</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">{{$coachcount}}</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">No of Academies</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">{{$officialcount}}</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Player Report -->
                <div class="col-span-12 xl:col-span-12 mt-6">
                    <hr>
                </div>              
               
                <!-- <div class="col-span-12 2xl:col-span-3">
                    <div class="2xl:border-l -mb-10 pb-10">
                        <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                           
                            <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-2xl font-bold truncate mr-auto text-pending">
                                        Important Announcements
                                    </h2>
                                    <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                    <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                                </div>
                                <div class="mt-3 intro-x">
                                    <div class="box">
                                        <div class="tiny-slider" id="important-notes">
                                            <div class="p-5">
                                                <div class="text-base font-medium truncate">48th sub junior national basketball championship</div>
                                                <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                <div class="text-slate-500 text-justify mt-1">Pondicherry basketball association under the aegis of basketball federation of india is hosting 48th sub junior national basketball championship for boys & girls at pondicherry from 3rd – 9th august 2023.</div>
                                                <div class="font-medium flex mt-5">
                                                    <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                </div>
                                            </div>
                                            <div class="p-5">
                                                <div class="text-base font-medium truncate">48th sub junior national basketball championship</div>
                                                <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                <div class="text-slate-500 text-justify mt-1">Pondicherry basketball association under the aegis of basketball federation of india is hosting 48th sub junior national basketball championship for boys & girls at pondicherry from 3rd – 9th august 2023.</div>
                                                <div class="font-medium flex mt-5">
                                                    <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                </div>
                                            </div>
                                            <div class="p-5">
                                                <div class="text-base font-medium truncate">48th sub junior national basketball championship</div>
                                                <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                <div class="text-slate-500 text-justify mt-1">Pondicherry basketball association under the aegis of basketball federation of india is hosting 48th sub junior national basketball championship for boys & girls at pondicherry from 3rd – 9th august 2023.</div>
                                                <div class="font-medium flex mt-5">
                                                    <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div> -->


            <!-- BEGIN: Weekly Top Products -->
            <div class="col-span-12 mt-6">
                <!-- BEGIN: Players Statistics -->
                <div class="col-span-12 xl:col-span-4 mt-1">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Upcoming Tournaments
                        </h2>
                    </div>                  
                </div>
                <!-- END: Players Statistics -->
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                     <table class="table table-report -mt-2" id="players-table">
                <thead>
                <tr>
                        <th class="whitespace-nowrap">S.No</th>
                        <th class="whitespace-nowrap">Tournament Name</th>
                        <th class="text-start whitespace-nowrap">Location</th>
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
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_name }}</span>.
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_location }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_start_date }}</span>
                        </td>
                        <td class="text-start">
                            <span class="font-medium whitespace-nowrap">{{ $value->tournament_end_date }}</span>
                        </td>
                        <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <?php 
                            $entries = \App\Models\TourEntries::where('tournament_id', $value->id)
                            ->where('state_id', $state_id)
                            ->first();
                            
                            ?>
                            @if(empty($entries))
                                <a class="flex items-center text-info mr-2 text-xs" href="{{route('state/tournament/register', $value->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye w-3 h-3 mr-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Register </a>
                              @else
                              <a href="{{Storage::disk('s3')->url('BFI/acknowledge/'.$entries->acknowledge)}}" target="_blank" class="btn btn-sm btn-danger w-80 mr-2 mb-2">Download Acknowledgement</a>
                              @endif
                            </div>
                        </td>
                    </tr>
                    <?php $counter++; ?>
                    @endforeach
                </tbody>
            </table>
                </div>
              
            </div>
            <!-- END: Weekly Top Products -->

            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

@endsection