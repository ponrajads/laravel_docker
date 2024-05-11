@extends('layouts.admin.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-2xl font-bold truncate text-primary mt-8">
    Upload Coaches<a class="btn btn-sm btn-pending-soft w-24 float-right" href="{{ route('admin/dashboard') }}">Go Back</a>
    </h2>
    <hr class="mt-4 mb-2">
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
    <form action="{{ route('admin/uploadcoachesdata') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-4">
            
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Coach Data :<span>* (Accepted File Only .xlsx Max Upload Size 3MB)</span></label>
                    <input type="file" class="form-control" name="player_data" placeholder="Input inline 1" aria-label="default input inline 1" accept=".xlsx" required>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-2">
        <div id="icon-button" class="py-5">
            <div class="preview">
                <div class="flex flex-wrap">
                    <a href="{{route('admin/allcoaches')}}" class="btn btn-sm btn-danger w-32 mr-2 mb-2"> <i data-lucide="corner-down-left" class="w-4 h-4 mr-2"></i> Cancel </a>
                    <button type="submit" name="submit" class="btn btn-sm btn-success text-white w-32 mr-2 mb-2"> <i data-lucide="plus-circle" class="w-4 h-4 mr-2"></i> Upload Coaches </button>
                </div>
            </div>
        </div>
    </form>

   
</div>
<!-- END: Content -->

@endsection