@extends('layouts.coach.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content dashboard">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Player Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            District Dashboard
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">District Name</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">{{$user->name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">District UID</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">{{$user->username}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">Age Category</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">-</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                <div class="text-base text-slate-500 mt-1">Tournaments</div>
                                <div class="text-lg leading-4 text-primary font-light mt-3">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Player Report -->
                <div class="col-span-12 xl:col-span-12 mt-6">
                    <hr>
                </div>

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12">
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
                                    <table class="table table-report sm:mt-2" id="players-table">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">TOURNAMENT DETAILS</th>
                                                <th class="text-center whitespace-nowrap">CATEGORY</th>
                                                <th class="text-center whitespace-nowrap">STATUS</th>
                                                <!-- <th class="text-center whitespace-nowrap">ACTIONS</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

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
