@extends('layouts.auth.login')

@section('content')
<div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="#" class="-intro-x flex items-center pt-5">
                        <!-- <img alt="indian Rugby ORS Logo" class="w-20" src="dist/images/logo/rugby_logo.png"> -->
                        <img alt="Indian Rugby Logo" class="w-3/4" src="dist/images/logo/logo.png">
                    </a>
                    <div class="my-auto">
                        <img alt="Indian Rugby ORS" class="-intro-x w-3/4 -mt-16" src="dist/images/loginimg.png">
                        <div class="-intro-x text-white font-medium text-4xl mt-0 font-heading">
                           
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-6 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-3/4">
                        <h2 class="intro-x font-extrabold text-3xl xl:text-3xl text-center xl:text-left text-primary underline">
                            Member Login
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center"></div>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="intro-x mt-4">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" id="username" name="username" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username" value="{{ old('username') }}" required autofocus>
                                    @error('username')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="">Password</label>
                                    <input type="password" class="intro-x login__input form-control py-3 px-4 block @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="***********">
                                    @error('password')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} class="form-check-input border mr-2">
                                    <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                                </div>
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="intro-x mt-4 xl:mt-8 text-center xl:text-left">
                                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="intro-x sm:mt-10 xl:mt-5 text-slate-600 dark:text-slate-500 text-center xl:text-left text-lg"> Don't have an account? <b>Register as</b></div>
                        <div class="flex sm:mx-auto mt-5">
                            <a href="{{route('player/register')}}" class="btn btn-secondary">Player</a>
                            <a href="{{route('coach/register')}}" class="btn btn-secondary ml-2">Coach</a>
                            <a href="{{route('district/register')}}" class="btn btn-secondary ml-2">District</a>
                            <a href="{{route('club/register')}}" class="btn btn-secondary ml-2">Club/Academy</a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
@endsection
