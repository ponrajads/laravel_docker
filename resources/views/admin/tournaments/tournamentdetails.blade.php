@extends('layouts.admin.dashboard.header')
@section('content')

<div class="content">
    <h2 class="text-xl font-bold truncate text-primary mt-8">
        View Tournament Details <a class="btn btn-sm btn-pending-soft w-24 float-right" href="dashboard.php">Back to Home</a>
    </h2>
    <hr class="mt-4 mb-2">
    <form class="validate-form mt-4" novalidate="true">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Name :<span>*</span></label>
                    <input type="text" class="form-control" aria-label="default input inline 1" disabled="" value="{{$tournament->tournament_name}}">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Location :<span>*</span></label>
                    <input type="text" class="form-control" aria-label="default input inline 1" disabled="" value="{{$tournament->tournament_location}}">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Venue Address :<span>*</span></label>
                    <textarea rows="5" class="form-control" disabled>{{$tournament->venue_address}}</textarea>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Pincode :<span>*</span></label>
                    <input type="text" class="form-control" value="{{$tournament->pincode}}" aria-label="default input inline 1" disabled="">
                </div>
                <div class="form-group mt-4">
                    <label for="" class="form-label">Venue State :<span>*</span></label>
                    <input type="text" class="form-control" value="{{$tournament->stateName}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entry Last Date :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$tournament->entry_last_date}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entry Last Date With Fine :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$tournament->entry_last_date_with_fine}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament Start Date :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$tournament->tournament_start_date}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Tournament End Date :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$tournament->tournament_end_date}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Circular File :<span>*</span></label>
                   <a href="{{ Storage::disk('s3')->url('BFI/circular/' . $tournament->circular_file) }}" target="_blank" download class="btn btn-sm btn-danger w-35 text-white">Download Circular</a>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Entries Type :<span>*</span></label>
                    @if($tournament->entries_type == 1)
                        <input type="text" class="form-control" value="Manual Offline Entries" aria-label="default input inline 1" disabled="">
                    @elseif($tournament->entries_type == 2)
                        <input type="text" class="form-control" value="State Online Entries" aria-label="default input inline 1" disabled="">
                    @else
                        <input type="text" class="form-control" value="Open Online Entries" aria-label="default input inline 1" disabled="">
                    @endif
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-2"> 
        <?php 
            $ageCategory = \App\Models\TourAgeCategory::where('tournament_id', $tournament->id)->get();
        ?>
        @if($ageCategory !== null)
        <h2 class="text-xl font-bold truncate text-primary mt-4 mb-3">Age Category </h2>
        @foreach($ageCategory as $value)
        <div class="grid grid-cols-12 gap-4 mb-4">
            <div class="col-span-12 md:col-span-4 lg:col-span-4">
                <div class="form-group">
                    <label for="" class="form-label">Age Category :<span>*</span></label>
                   <?php $categ = \App\Models\MAgeCategory::where('id',$value->age_category)->first(); ?>
                   <br>{{$categ->ageCategoryName}}
                </div>
            </div>
            <div class="col-span-12 md:col-span-3 lg:col-span-3">
                <div class="form-group">
                    <label for="" class="form-label">DOB Start Date :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$value->dob_start_date}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            <div class="col-span-12 md:col-span-3 lg:col-span-3">
                <div class="form-group">
                    <label for="" class="form-label">DOB End Date :<span>*</span></label>
                    <input type="date" class="form-control" value="{{$value->dob_end_date}}" aria-label="default input inline 1" disabled="">
                </div>
            </div>
            
        </div>
       @endforeach
       @endif
      
</div>
@endsection