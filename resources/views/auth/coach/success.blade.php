@extends('layouts.auth.register')
@section('content')

<div class="container sm:px-5">
        <div class="block xl:grid grid-cols-12 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen col-span-12 md:col-span-4 lg:col-span-4">
                <a href="#" class="-intro-x flex items-center pt-5">
                    <!-- <img alt="Basket Ball ORS Logo" class="w-20" src="dist/images/logo/basketball_logo.png"> -->
                    <img alt="Basket Ball ORS Logo" class="w-3/4" src="{{asset('dist/images/logo/logo.png')}}">
                </a>
                <div class="my-auto">
                    <img alt="Basket Ball ORS" class="-intro-x w-3/4 -mt-16" src="{{asset('dist/images/loginimg.png')}}">
                    <div class="-intro-x text-white font-medium text-4xl mt-0 font-heading">
                        A few more clicks to  
                        <br>
                        Create your account.
                    </div>
                    <div class="-intro-x font-medium text-xl mt-10 text-white">
                       Already You have an account? <br><a href="{{ route('login') }}" class="underline text-warning">Login Now!</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto py-5 xl:py-0 my-10 xl:my-0 w-full col-span-12 md:col-span-8 lg:col-span-8">
                <div x-data="app()" x-cloak>
                    <div class="max-w-3xl mx-auto px-4 pt-2">
                        <div>
                            <div class="bg-white  p-10 flex items-center shadow justify-between">
                                <div>
                                    <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="#04aa6d">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                                    <div class="text-gray-600 mb-8">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thank you. We have sent an email to your registered email I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>

                                    <a href="{{ route('login') }}" 
                                        class="w-40 block mx-auto focus:outline-none py-2 px-5 shadow-sm text-center text-gray-600 bg-success text-white hover:bg-gray-100 font-medium border" 
                                    >Back to Login</a>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                    
                    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- Include this script in your page with the form -->

@endsection