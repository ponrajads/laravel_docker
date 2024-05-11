@extends('layouts.player.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-2xl font-bold truncate text-primary mt-10">
        Coach ID Card
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">  
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
            <div class="box">
                <div class="p-5">
                    <div class="">
                        <img alt="player id card" class="rounded-md shadow" src="{{ Storage::disk('s3')->url($idCardPaths['front']) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6">
            <div class="box">
                <div class="p-5">
                    <div class="">
                        <img alt="player id card" class="rounded-md shadow" src="{{ Storage::disk('s3')->url($idCardPaths['back']) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 items-center">
            <nav class="w-full sm:w-auto sm:mx-auto text-center">
                <a href="{{route('coach.generate.idcard.pdf')}}" class="btn btn-success">Download</a>
            </nav>
        </div>
    </div>
 </div>
<!-- END: Content -->

@endsection