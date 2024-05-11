@extends('layouts.admin.dashboard.header')
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
                            Players Report
                        </h2>
                        <a href="#" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-primary">{{$allplayer}}</div>
                                    <div class="text-base text-slate-500 mt-1">All Players</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-success">{{$approvedplayer}}</div>
                                    <div class="text-base text-slate-500 mt-1">Approved Players</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-pending">{{$pendingplayer}}</div>
                                    <div class="text-base text-slate-500 mt-1">Pending Players</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-danger">{{$rejectedplayer}}</div>
                                    <div class="text-base text-slate-500 mt-1">Rejected Players</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Player Report -->
                <!-- BEGIN: Coaches Report -->
                <div class="col-span-12">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Coach Report
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-primary">{{$allcoaches}}</div>
                                    <div class="text-base text-slate-500 mt-1">All Coaches</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-success">{{$approvedcoaches}}</div>
                                    <div class="text-base text-slate-500 mt-1">Approved Coaches</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-pending">{{$pendingcoaches}}</div>
                                    <div class="text-base text-slate-500 mt-1">Pending Coaches</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-danger">{{$rejectedcoaches}}</div>
                                    <div class="text-base text-slate-500 mt-1">Rejected Coaches</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Academy Report
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-primary">{{$allclub}}</div>
                                    <div class="text-base text-slate-500 mt-1">All Academy</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-success">{{$approvedclub}}</div>
                                    <div class="text-base text-slate-500 mt-1">Approved Academy</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-pending">{{$pendingclub}}</div>
                                    <div class="text-base text-slate-500 mt-1">Pending Academy</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-danger">{{$rejectedclub}}</div>
                                    <div class="text-base text-slate-500 mt-1">Rejected Academy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            District Report
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-primary">{{$alldistricts}}</div>
                                    <div class="text-base text-slate-500 mt-1">All Districts</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-success">{{$approveddistricts}}</div>
                                    <div class="text-base text-slate-500 mt-1">Approved Districts</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-pending">{{$pendingdistricts}}</div>
                                    <div class="text-base text-slate-500 mt-1">Pending Districts</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-danger">{{$rejecteddistricts}}</div>
                                    <div class="text-base text-slate-500 mt-1">Rejected Districts</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Coaches Report -->
                <!-- BEGIN: Officials Report -->
                {{-- <div class="col-span-12">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Officials Report
                        </h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-2">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-primary">{{$allofficials}}</div>
                                    <div class="text-base text-slate-500 mt-1">All Officials</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-success">{{$approvedofficials}}</div>
                                    <div class="text-base text-slate-500 mt-1">Approved Officials</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-pending">{{$pendingofficials}}</div>
                                    <div class="text-base text-slate-500 mt-1">Pending Officials</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-medium leading-8 text-danger">{{$rejectedofficials}}</div>
                                    <div class="text-base text-slate-500 mt-1">Rejected Officials</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Officials Report -->





                {{-- <div class="col-span-12 xl:col-span-12 mt-6">
                    <hr>
                </div> --}}




                <!-- BEGIN: Players Statistics -->
                {{-- <div class="col-span-12 xl:col-span-4 mt-1">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Players Statistics
                        </h2>
                    </div>
                    <div class="mt-2">
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>All Players</div>
                                </div>
                                <div class="py-0 px-2 text-base text-primary cursor-pointer font-bold">{{$allplayer}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Approved Players</div>
                                </div>
                                <div class="py-0 px-2 text-base text-success cursor-pointer font-bold">{{$approvedplayer}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Pending Players</div>
                                </div>
                                <div class="py-0 px-2 text-base text-pending cursor-pointer font-bold">{{$pendingplayer}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Rejected Players</div>
                                </div>
                                <div class="py-0 px-2 text-base text-danger cursor-pointer font-bold">{{$rejectedplayer}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto ">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Blocked Players</div>
                                </div>
                                <div class="py-0 px-2 text-base text-dark cursor-pointer font-bold">{{$blockedplayer}}</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Players Statistics -->
                <!-- BEGIN: Coaches Statistics -->
                {{-- <div class="col-span-12 xl:col-span-4 mt-1">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Coaches Statistics
                        </h2>
                    </div>
                    <div class="mt-2">
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>All Coaches</div>
                                </div>
                                <div class="py-0 px-2 text-base text-primary cursor-pointer font-bold">{{$allcoaches}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Approved Coaches</div>
                                </div>
                                <div class="py-0 px-2 text-base text-success cursor-pointer font-bold">{{$approvedcoaches}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Pending Coaches</div>
                                </div>
                                <div class="py-0 px-2 text-base text-pending cursor-pointer font-bold">{{$pendingcoaches}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Rejected Coaches</div>
                                </div>
                                <div class="py-0 px-2 text-base text-danger cursor-pointer font-bold">{{$rejectedcoaches}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto ">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Blocked Coaches</div>
                                </div>
                                <div class="py-0 px-2 text-base text-dark cursor-pointer font-bold">{{$blockedcoaches}}</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Coaches Statistics -->
                <!-- BEGIN: Officials Statistics -->
                {{-- <div class="col-span-12 xl:col-span-4 mt-1">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-xl font-bold truncate text-primary mr-5">
                            Officials Statistics
                        </h2>
                    </div>
                    <div class="mt-2">
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>All Officials</div>
                                </div>
                                <div class="py-0 px-2 text-base text-primary cursor-pointer font-bold">{{$allofficials}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Approved Officials</div>
                                </div>
                                <div class="py-0 px-2 text-base text-success cursor-pointer font-bold">{{$approvedofficials}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Pending Officials</div>
                                </div>
                                <div class="py-0 px-2 text-base text-pending cursor-pointer font-bold">{{$pendingofficials}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Rejected Officials</div>
                                </div>
                                <div class="py-0 px-2 text-base text-danger cursor-pointer font-bold">{{$rejectedofficials}}</div>
                            </div>
                        </div>
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="ml-0 mr-auto ">
                                    <div class="font-medium flex"><i data-lucide="users" class="w-4 h-4 mr-3"></i>Blocked Officials</div>
                                </div>
                                <div class="py-0 px-2 text-base text-dark cursor-pointer font-bold">{{$blockedofficials}}</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- END: Officials Statistics -->

            </div>
        </div>
    </div>
</div>
<!-- END: Content -->


@endsection
