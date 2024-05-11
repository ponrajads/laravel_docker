@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Player Details <a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{route('admin/allplayers')}}">Go Back</a>
    </h2>
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
                        <div class="font-medium">First Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->first_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Last Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->last_name}}</div>
                </div>
            </div>
        </div>      
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Date of Birth</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{date("d-m-Y",strtotime($user->dob))}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Gender</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->gender}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Email</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->email}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Phone</div>
                    </div>
                    <div class="text-slate-500 playervalue">+91 {{$user->mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Father/Guardian Name</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->father_name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Father/Guardian Mobile Number</div> 
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->father_mobile}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Aadhar No</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->aadhar}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Blood Group</div>
                    </div>
                    @if($user->blood_group != '')
                    <?php $blood = \App\Models\MBloodGroup::where('id',$user->blood_group)->first();?>
                    <div class="text-slate-500 playervalue">{{$blood->name}}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Username (UID)</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->username}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">User Status</div>
                    </div>
                    @if($user->status == 1)
                    <div class="text-success playervalue">Approved</div>
                    @elseif($user->status == 0)
                    <div class="text-warning playervalue">Pending</div>
                    @elseif($user->status == 2)
                    <div class="text-danger playervalue">Rejected</div>
                    @elseif($user->status == 3)
                    <div class="text-danger playervalue">Blocked</div>
                    @elseif($user->status == 4)
                    <div class="text-danger playervalue">Hold</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">State Verify</div>
                    </div>
                    @if($user->stateverify == 1)
                    <div class="text-success playervalue">Verified</div>
                    @elseif($user->stateverify == 0)
                    <div class="text-warning playervalue">Pending</div>
                    @elseif($user->stateverify == 2)
                    <div class="text-danger playervalue">Rejected</div>
                    @elseif($user->stateverify == 3)
                    <div class="text-danger playervalue">Blocked</div>
                    @elseif($user->stateverify == 4)
                    <div class="text-danger playervalue">Hold</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <hr class="mt-4 mb-3">
        </div>

        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <h2 class="text-xl font-bold truncate text-pending h-10">
            Permanent Address :
            </h2>
            <div class="intro-x">
                <div class="box px-5 py-3 mb-1 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Address</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->address}}</div>
                </div>
            </div>
            
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Pincode / Zipcode</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->pincode}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <h2 class="text-xl font-bold truncate text-pending h-10">
            Communication Address :
            </h2>
            <div class="intro-x">
                <div class="box px-5 py-3 mb-1 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Address</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->caddress}}</div>
                </div>
            </div>
            
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Pincode / Zipcode</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->cpincode}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <hr class="mt-4 mb-2">
        </div>
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Association Details :
            </h2>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Association Name</div>
                    </div>
                    <?php $association = \App\Models\MAssociation::where('id',$user->association)->first();?>
                    <div class="text-slate-500 playervalue">{{$association->name}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Location</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$association->state}}</div>
                </div>
            </div>
        </div>

        <div class="col-span-12">
            <hr class="mt-4 mb-2">
        </div>
        <div class="col-span-12 flex items-center h-10">
            <h2 class="text-xl font-bold truncate text-pending">
                Bank Details :
            </h2>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Bank Name</div>
                    </div>
                    <?php $bank = \App\Models\Mbank::where('id',$user->bank_name)->first();?>
                    @if(isset($bank) || !empty($bank))
                    <div class="text-slate-500 playervalue">{{$bank->name}}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Branch</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->bank_branch}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Account Number</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->bank_account}}</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">IFSC Code</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->bank_ifsc}}</div>
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
                   
                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/photo/' . $user->photo) }}">
                    
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
                        <div class="font-medium">DOB Proof</div>
                    </div>
                    <div class="mt-4"> 
                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/dob_proof/' . $user->dob_proof) }}">
                        
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
                        <div class="font-medium">Address Proof</div>
                    </div>
                    <div class="mt-4">
                        <img alt="proof" class="rounded-md" onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png';" src="{{ Storage::disk('s3')->url('IRFU/address_proof/' . $user->address_proof) }}">
                      
                    </div>
                    <div class="flex space-between mt-4">
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="eye" class="w-3 h-3 mr-1"></i> View</button>
                        <button class="btn btn-sm btn-linkedin w-24"><i data-lucide="download" class="w-3 h-3 mr-1"></i> Download</button>
                    </div>
                </div>
            </div>
        </div>
        @if($user->status == 3)
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Blocked By</div>
                    </div>
                    <?php $rejected_by = \App\Models\User::where('id', $user->rejected_by)->first(); ?>
                    <div class="text-slate-500 playervalue">{{$rejected_by->name}}</div>
                </div>
            </div>
        </div>
        @endif
        @if($user->status == 2)
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Rejected By</div>
                    </div>
                    <?php $rejected_by = \App\Models\User::where('id', $user->rejected_by)->first(); ?>
                    <div class="text-slate-500 playervalue">{{$rejected_by->name}}</div>
                </div>
            </div>
        </div>
        
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Rejected Reason</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->reason}}</div>
                </div>
            </div>
        </div>
        @endif
        @if($user->stateverify == 3)
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Blocked By</div>
                    </div>
                    <?php $rejected_by = \App\Models\User::where('id', $user->rejected_by)->first(); ?>
                    <div class="text-slate-500 playervalue">{{$rejected_by->name}}</div>
                </div>
            </div>
        </div>
        @endif
        @if($user->stateverify == 2)
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Rejected By</div>
                    </div>
                    <?php $rejected_by = \App\Models\User::where('id', $user->rejected_by)->first(); ?>
                    <div class="text-slate-500 playervalue">{{$rejected_by->name}}</div>
                </div>
            </div>
        </div>
        
        <div class="col-span-12 md:col-span-12 2xl:col-span-12">
            <div class="intro-x">
                <div class="box px-5 py-3 mb-0 flex items-center zoom-in">
                    <div class="text-start w-1/4">
                        <div class="font-medium">Rejected Reason</div>
                    </div>
                    <div class="text-slate-500 playervalue">{{$user->reason}}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <hr class="mt-8 mb-2">
    <div id="icon-button" class="py-5">
        <div class="preview">
            <div class="flex flex-wrap justify-end">
                <a href="{{route('admin/allplayers')}}" class="btn btn-instagram w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Back </a>
                @if($user->stateverify != 1)
                @if($user->stateverify != 3 && $user->stateverify != 2)
                <a href="#" class="btn btn-primary w-32 mr-2 mb-2" data-tw-toggle="modal" data-tw-target="#block-modal"> <i data-lucide="x-circle" class="w-4 h-4 mr-2"></i> Block </a>
                
                @if($user->stateverify != 2)
                <a href="#" class="btn btn-danger w-32 mr-2 mb-2" data-tw-toggle="modal" data-tw-target="#reject-modal"> <i data-lucide="thumbs-down" class="w-4 h-4 mr-2"></i> Reject </a>
                @endif
                @endif
                <a href="#" class="btn btn-success text-white w-32 mr-2 mb-2" data-tw-toggle="modal" data-tw-target="#approve-modal" data-user-id="{{ $user->user_id }}"> <i data-lucide="thumbs-up" class="w-4 h-4 mr-2"></i> Verify </a>
                @endif
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
                        Do you really want to verify this player? 
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" id="approve-button" data-tw-dismiss="modal" class="btn btn-success text-white w-24"
    onclick="approveUser('{{ $user->user_id }}')">Approve</button>
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
                        Do you really want to reject this player? 
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
                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-24" onclick="rejectUser('{{ $user->user_id }}')">Reject</button>
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
                        Do you really want to block this player? 
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24" onclick="blockUser('{{ $user->user_id }}')">Block</button>
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
            url: baseUrl + "/state/player/approve/" + userId,
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);
                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been verified successfully.',
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
            url: baseUrl + "/state/player/reject/"+userId+"/"+selectedReason, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been rejected successfully.',
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
            url: baseUrl + "/state/player/block/"+userId, // Replace with your actual route
            type: 'GET',
            success: function(response) {
                // Handle success response
                console.log(response);

                if(response.status == 'success'){
                 Swal.fire({
                    title: 'Success',
                    text: 'Player has been blocked successfully.',
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

@endsection