@extends('layouts.admin.dashboard.header')
@section('content')


<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        Add Tournament <a class="btn btn-sm btn-pending-soft w-24 float-right" href="tourlist.php">Go Back</a>
    </h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <hr class="mt-4 mb-2">
    <form class="mt-4" id="addTournamentForm" action="{{route('tournament/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Name :<span>*</span></label>
                    <input type="text" class="form-control" name="tournamentname" id="tournamentname" placeholder="Enter Tournament Name" required aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Location :<span>*</span></label>
                    <input type="text" class="form-control" name="tournamentlocation" id="tournamentlocation" placeholder="Enter Tournament Location" required aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Venue Address :<span>*</span></label>
                    <textarea rows="5" class="form-control" required name="venueaddress" id="venueaddress"  placeholder="Enter Venue Address"></textarea>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Pincode :<span>*</span></label>
                    <input type="text" class="form-control" required name="pincode" id="pincode" minlength="6" maxlength="6" placeholder="Enter Pincode" aria-label="default input inline 1">
                </div>
                <div class="form-group mt-4">
                    <label for="" class="form-label">Venue State :<span>*</span></label>
                    <select data-placeholder="Select State" name="state" id="state" required class="tom-select w-full">
                        <option value="" selected>-- Select State --</option>
                        <?php foreach ($states as $key => $value) { ?>
                            <option value="{{ $value->id }}">{{ $value->stateName }}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entry Last Date :<span>*</span></label>
                    <input type="date" class="form-control" required name="entrylastdate" id="entrylastdate" placeholder="Input inline 1" aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entry Last Date With Fine :<span>*</span></label>
                    <input type="date" class="form-control" required name="entrylastdatewithfine" id="entrylastdatewithfine" placeholder="Input inline 1" aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Start Date :<span>*</span></label>
                    <input type="date" class="form-control" required name="tournamentstartdate" id="tournamentstartdate" placeholder="Input inline 1" aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament End Date :<span>*</span></label>
                    <input type="date" class="form-control" required name="tournamentenddate" id="tournamentenddate" placeholder="Input inline 1" aria-label="default input inline 1">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Circular File :<span>* (Accepted File Only .pdf Max Upload Size 5MB)</span></label>
                    <input type="file" name="file" class="form-control" required placeholder="Input inline 1" aria-label="default input inline 1" accept="application/pdf">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Logo:<span>* (Accepted File Only .jpg Max Upload Size 5MB)</span></label>
                    <input type="file" name="logo" class="form-control" required placeholder="Input inline 1" aria-label="default input inline 1" accept=".jpg">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entries Type :<span>*</span></label>
                    <select class="form-select" name="entriestype" required id="entriestype" aria-label="Default select example">
                        <option>-- Entries Type --</option>
                        <option value="1">Manual Offline Entries</option>
                        <option value="2">State Online Entries</option>
                        <option value="3">Open Online Entries</option>
                    </select>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-2">
        <h2 class="text-xl font-bold truncate text-primary mt-4 mb-3">Age Category</h2>
        <input type="hidden" name="hidden_age_category_count" id="hidden_age_category_count">
    <div id="ageCategoriesContainer">
        <!-- Initially display the first age category -->
        <div class="age-category-section">
            <div class="grid grid-cols-12 gap-4 mb-4">
                <div class="col-span-12 md:col-span-4 lg:col-span-4">
                    <div class="form-group">
                        <label for="" class="form-label">Age Category :<span>*</span></label>
                        <select class="form-select" name="agecategory_0" id="agecategory_0" aria-label="Default select example">
                            <option>-- Select Age Category --</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                            <option value="3">U20 Boys</option>
                            <option value="4">U20 Girls</option>
                            <option value="5">U18 Boys</option>
                            <option value="6">U18 Girls</option>
                            <option value="7">U17 Girls</option>
                            <option value="8">U17 Boys</option>
                            <option value="9">U16 Boys</option>
                            <option value="10">U16 Girls</option>
                            <option value="11">U14 Boys</option>
                            <option value="12">U14 Girls</option>
                        </select>
                        @if ($errors->has('agecategory_0'))
                                    <span class="help-block">
                                        <span class="text-danger">{{ $errors->first('agecategory_0') }}</span>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="col-span-12 md:col-span-2 lg:col-span-2">
                    <div class="form-group">
                        <label for="" class="form-label">DOB Start Date :<span>*</span></label>
                        <input type="date" class="form-control" id="dob_start_date_0" name="dob_start_date_0" value="{{ old('dob_start_date_0') }}" autocomplete="off" onchange="validateAllDate(0)" max="2015-12-31" required onkeydown="return false"/>
                                    @if ($errors->has('dob_start_date_0'))
                                    <span class="help-block">
                                        <span class="text-danger">{{ $errors->first('dob_start_date_0') }}</span>
                                    </span>
                                    @endif
                    </div>
                </div>
                <div class="col-span-12 md:col-span-2 lg:col-span-2">
                    <div class="form-group">
                        <label for="" class="form-label">DOB End Date :<span>*</span></label>
                        <input type="date" class="form-control" id="dob_end_date_0" name="dob_end_date_0" value="{{ old('dob_end_date_0') }}" max="2015-12-31" autocomplete="off" onchange="validateAllDate(0)" required onkeydown="return false"/>
                                    @if ($errors->has('dob_end_date_0'))
                                    <span class="help-block">
                                        <span class="text-danger">{{ $errors->first('dob_end_date_0') }}</span>
                                    </span>
                                    @endif
                    </div>
                </div>
                <div class="col-span-12 md:col-span-2 lg:col-span-2">
                    <div class="form-group">
                        <label for="" class="form-label">Player Count for Team:<span>*</span></label>
                        <input type="number" class="form-control" id="player_count_0" name="player_count_0" value="{{ old('player_count_0') }}" autocomplete="off" required/>
                                    @if ($errors->has('player_count_0'))
                                    <span class="help-block">
                                        <span class="text-danger">{{ $errors->first('player_count_0') }}</span>
                                    </span>
                                    @endif
                    </div>
                </div>
                <!-- <div class="col-span-12 md:col-span-2 lg:col-span-2">
                    <div class="form-group">
                        <label for="" class="form-label">Coach Count:<span>*</span></label>
                        <input type="number" class="form-control" id="official_count_0" name="official_count_0" value="{{ old('official_count_0') }}" autocomplete="off" required/>
                                    @if ($errors->has('official_count_0'))
                                    <span class="help-block">
                                        <span class="text-danger">{{ $errors->first('official_count_0') }}</span>
                                    </span>
                                    @endif
                    </div>
                </div> -->
                <div class="col-span-12 md:col-span-2 lg:col-span-2 align-self-end text-left">
                <input type="button" name="add_btn" value="ADD" style="margin-top:30px" class="btn btn-success" onclick="appendNewCategoryTab()">
                    <!-- The first age category should not have a "Remove" button -->
                </div>
            </div>
        </div>
    </div>

    <!-- Age category template (hidden) -->
    <div id="append_new_category_tab"></div>

        <hr class="mt-8 mb-2">
        <div id="icon-button" class="py-5">
            <div class="preview">
                <div class="flex flex-wrap justify-center">
                    <a href="{{ URL::previous() }}" class="btn btn-danger w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Cancel </a>
                   
                    <button type="submit" class="btn btn-success text-white w-32 mr-2 mb-2"><i data-lucide="thumbs-up" class="w-4 h-4 mr-2"></i> Create </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END: Content -->


@endsection