@extends('layouts.admin.dashboard.header')
@section('content')

<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Create Team <a class="btn btn-sm btn-pending-soft w-24 float-right" href="tourlist.php">Go Back</a>
    </h2>
    <hr class="mt-4 mb-2">
    <form class="validate-form mt-4" novalidate="true">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 text-center">
                <h2 class="text-4xl font-bold">{{$tournament->tournament_name}}</h2>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-6 align-self-end">
                <div class="form-group w-1/2 float-left pr-2">
                    <label for="" class="form-label">Start Date :<span class="ml-2">{{date('d-m-Y',strtotime($tournament->tournament_start_date))}}</span></label>
                </div>
                <div class="form-group w-1/2 float-right pl-2">
                    <label for="" class="form-label">End Date :<span class="ml-2">{{date('d-m-Y',strtotime($tournament->tournament_end_date))}}</span></label>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Location :<span class="ml-2">{{$tournament->tournament_location}}</span></label>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">No of Players :<span>*</span></label>
                    <input type="text" class="form-control" placeholder="Enter No of Players" aria-label="default input inline 1">
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-2">
        <div class="grid grid-cols-12 gap-4 mt-4">

            <div class="col-span-12 md:col-span-6 lg:col-span-6" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2 class="text-2xl font-bold">All Players</h2>
                <div class="serachpart px-3 py-3">
                    <select class="tom-select w-full tomselected" id="tomselect-1" tabindex="-1" hidden="hidden"><option disabled="" selected="true">Search Players</option>
                        
                        <option value="2">Johnny Deep</option>
                        <option value="3">Robert Downey, Jr</option>
                        <option value="4">Samuel L. Jackson</option>
                        <option value="5">Morgan Freeman</option>
                    </select>
                </div>
                <div class="mt-5 px-3 allplayerslist" id="entryplayers">
                    <div class="intro-y" id="todotarget1" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget2" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget3" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget4" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget5" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget6" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget7" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                    <div class="intro-y" id="todotarget8" ondragstart="dragStart(event)" draggable="true">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="player" src="../dist/images/profile-6.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Vishesh Bhriguvanshi</div>
                                <div class="text-slate-500 text-xs mt-0.5">BFIMA102023</div>
                            </div>
                            <div class="py-1 px-2 text-xs bg-success text-white cursor-pointer font-medium project-name">View</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-6" id="progress" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2 class="text-2xl font-bold">Selected Players</h2>
                <div class="mt-5 px-3" id="entryplayers">



                </div>
            </div>
            
        </div>
        
        <hr class="mt-8 mb-2">
        <div id="icon-button" class="py-5">
            <div class="preview">
                <div class="flex flex-wrap justify-center">
                    <a href="tourlist.php" class="btn btn-danger w-32 mr-2 mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="corner-down-left" data-lucide="corner-down-left" class="lucide lucide-corner-down-left w-4 h-4 mr-2"><polyline points="9 10 4 15 9 20"></polyline><path d="M20 4v7a4 4 0 01-4 4H4"></path></svg> Cancel </a>
                    <a href="tourlist.php" class="btn btn-success text-white w-32 mr-2 mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="thumbs-up" data-lucide="thumbs-up" class="lucide lucide-thumbs-up w-4 h-4 mr-2"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"></path></svg> Create Team</a>
                </div>
            </div>
        </div>





    </form>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" data-lucide="x-circle" class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> 
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records? 
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>

@endsection