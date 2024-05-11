@extends('layouts.auth.district.register')
@section('content')
    <div class="container sm:px-5">
        <div class="block xl:grid grid-cols-12 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen col-span-12 md:col-span-4 lg:col-span-4">
                <a href="#" class="-intro-x flex items-center pt-5">
                    <!-- <img alt="Indian Rugby Logo" class="w-20" src="dist/images/logo/logo.png"> -->
                    <img alt="Indian Rugby Logo" class="w-3/4" src="{{ asset('dist/images/logo/logo.png') }}">
                </a>
                <div class="my-auto">
                    <img alt="Indian Rugby ORS" class="-intro-x w-3/4 -mt-16" src="{{asset('dist/images/loginimg.png')}}">
                    <div class="-intro-x text-white font-medium text-4xl mt-0 font-heading">
                        A few more clicks to
                        <br>
                        Create your account.
                    </div>
                    <div class="-intro-x font-medium text-xl mt-10 text-white">
                        If you have an account already. Login here<br><a href="{{ route('login') }}" class="underline text-warning">Login
                            Now!</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto py-5 xl:py-0 my-10 xl:my-0 w-full col-span-12 md:col-span-8 lg:col-span-8">
                <div x-data="app()" x-cloak>
                    <div class="max-w-3xl mx-auto px-4 pt-2">

                        <div x-show.transition="step === 'complete'">
                            <div class="bg-white  p-10 flex items-center shadow justify-between">
                                <div>
                                    <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="#04aa6d">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                                    <div class="text-gray-600 mb-8">
                                        Thank you. We have sent you an email to demo@demo.test. Please click the link in the
                                        message to activate your account.
                                    </div>

                                    <a href="{{ route('login') }}"
                                        class="w-40 block mx-auto focus:outline-none py-2 px-5 shadow-sm text-center text-gray-600 bg-success text-white hover:bg-gray-100 font-medium border">Back
                                        to Login</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <!-- Top Navigation -->
                            <div class="border-b-2 pt-0" id="stepone">
                                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                    x-text="`Step: 1 of 3`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1 w-3/5">
                                        <div data-step="1">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">Personal Information
                                            </div>
                                        </div>

                                        <div data-step="2">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                Treasurer Information</div>
                                        </div>
                                        <div data-step="3">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                File Uploads</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center w-2/5">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                :style="'width: ' + parseInt(step / 3 * 100) + '%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Top Navigation -->
                            <form action="{{ route('district/store') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateStep3();">
                                @csrf
                                <!-- Step Content -->
                                <div class="pt-5">
                                    <div x-show.transition.in="step === 1" data-step="1" id="steponestep">
                                        <div class="grid grid-cols-12 gap-4 mt-2">
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="district_name" class="form-label">District Name</label>
                                                <input type="text" name="district_name"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your District Name..." id="district_name">
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Name of the Member Unit</label>
                                                    <select name="association" id="association"
                                                        class="form-control">
                                                        <option value="">-- Select State --</option>
                                                        <?php $association = \App\Models\MAssociation::where('status', '1')->get(); ?>
                                                        @foreach ($association as $association)
                                                            <option value="{{ $association->id }}">
                                                                {{ $association->name }} {{ $association->statecode }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span id="association-error" class="text-red-500"></span>
                                                </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">Short Code</label>
                                                <input type="text"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your short Code..."
                                                     name="short_code"
                                                    value="{{ old('short_code') }}">
                                                <span id="short_code-error" class="text-red-500"></span>
                                                @error('short_code')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for=">date_incorporation" class="form-label">Date of Incorporation<span
                                                        class="text-red-500">*</span></label>
                                                <input type="date"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your Date Of Incorporation..."
                                                   name="date_incorporation"
                                                    value="{{ old('date_incorporation') }}">
                                                <span id="registered_certificate-error" class="text-red-500"></span>
                                                @error('registered_certificate')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="last_election" class="form-label">Last Election Held On</label>
                                                <input type="date" name="last_election"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your last Election..." id="last_election">
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="president_name" class="form-label">President Name</label>
                                                <input type="text" name="president_name"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your president Name..." id="president_name">
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="mobile" class="form-label">President Mobile Number</label>
                                                <input type="tel" onkeyup="checkMobileExist()"
                                                    onkeypress="return onlyNumberKey(event)" name="mobile" maxlength="10"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your mobile number..." id="mobile">
                                                <span id="mobile-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">President Email<span
                                                        class="text-red-500">*</span></label>
                                                <input type="email" onkeyup="checkEmailExist()" name="email"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your email address..." id="email">
                                                <span id="email-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Re-enter Email<span
                                                        class="text-red-500">*</span></label>
                                                <input type="email" name="re-email"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your email address..." id="re-email">
                                                <span id="re-email-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="secretary_name" class="form-label">Secretary Name<span
                                                        class="text-red-500">*</span></label>
                                                <input type="text" onkeypress="return onlyNumberKey(event)"
                                                    name="secretary_name"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your Secretary Name..."
                                                     id="secretary_name">
                                                <span id="aadhar-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="mobile" class="form-label">Secretary Mobile Number</label>
                                                <input type="tel" onkeyup="checkMobileExist()"
                                                    onkeypress="return onlyNumberKey(event)" name="secretary_mobile" maxlength="10"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your mobile number..." id="secretary_mobile">
                                                <span id="mobile-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Secretary Email<span
                                                        class="text-red-500">*</span></label>
                                                <input type="email" onkeyup="checkSecretaryEmailExist()" name="secemail"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your email address..." id="secemail">
                                                <span id="secemail-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Re-enter Email<span
                                                        class="text-red-500">*</span></label>
                                                <input type="email" name="secre-email"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your email address..." id="secre-email">
                                                <span id="secre-email-error" class="text-red-500"></span>
                                            </div>
                                        </div>
                                        <div class="border-t bottom-0 left-0 right-0 py-2 mt-3">
                                            <div class="max-w-3xl mx-auto px-4">
                                                <div class="flex justify-between">
                                                    <div class="w-1/2">
                                                    </div>
                                                    <div class="w-1/2 text-right" id="firststep">
                                                        <button type="button" onclick="validateAndNext()"
                                                            class="w-32 focus:outline-none border border-transparent py-2 px-5  shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show.transition.in="step === 2" data-step="2" id="steptwo">
                                        <div class="border-b-2 pt-0">
                                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                                x-text="`Step: 2 of 3`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>
                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">Treasurer
                                                            Information</div>
                                                    </div>
                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">File Uploads</div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(2 / 3 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(2 / 3 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="grid grid-cols-12 gap-2 mt-0">
                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending underline">Treasurer Information
                                                    </h2>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Treasurer Name</label>
                                                    <input type="text" onkeypress="return ValidateAlpha(event)"
                                                        name="treasurer_name"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Club/Academy Director Name...">
                                                    <span id="club-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Treasurer Name Mobile Number</label>
                                                    <input type="text" onkeypress="return onlyNumberKey(event)"
                                                        name="treasurer_mobile" maxlength="10"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Director Mobile Number...">
                                                    <span id="director_mobile_number-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="email" class="form-label">Treasurer Email<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="email" onkeyup="checkTreasurerEmailExist()" name="treasurer_email"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter your email address..." id="treasurer_email">
                                                    <span id="treasurer-email-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="email" class="form-label">Re-enter Email<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="email" name="re-treasurer-email"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter your email address..." id="re-treasurer-email">
                                                    <span id="re-treasurer-email-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending underline">
                                                        Address Information</h2>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Registered Office Address Line 1<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="register_address1"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Address Line 1...">
                                                    <span id="address1-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Registered Office Address 2</label>
                                                    <input type="text" name="register_address2"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Address Line 2...">
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Pincode<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="pincode"
                                                        onkeypress="return onlyNumberKey(event)"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        minlength="6" maxlength="6"
                                                        placeholder="Enter your Pincode...">
                                                    <span id="pincode-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">State<span
                                                            class="text-red-500">*</span></label>
                                                    <select data-placeholder="Select State" name="state"
                                                        class="tom-select w-full">
                                                        <option value="">-- Select State --</option>
                                                        <?php $states = \App\Models\MState::all(); ?>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->stateName }}
                                                                ({{ $state->stateCode }})</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="state-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">District</label>
                                                    <input type="text" name="district"
                                                        onkeypress="return ValidateAlpha(event)"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter District...">
                                                    <span id="district-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">City</label>
                                                    <input type="text" name="city"
                                                        onkeypress="return ValidateAlpha(event)"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Your City...">
                                                    <span id="city-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="country" class="form-label">Country
                                                        <span class="text-red-500">*</span></label>
                                                    <select name="country" id="country"
                                                        class="w-full form-select shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        onchange="toggleOtherQualificationInput()">
                                                        <option value="">-- Select Country--</option>
                                                        <option value="India">India</option>
                                                    </select>
                                                    <span id="country-error" class="text-red-500"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-t bottom-0 left-0 right-0 py-2 mt-3" id="secondstep">
                                            <div class="max-w-3xl mx-auto px-4">
                                                <div class="flex justify-between">
                                                    <div class="w-1/2">
                                                        <button type="button" onclick="validateStep1()"
                                                            class="w-32 focus:outline-none py-2 px-5 shadow-sm text-center text-white bg-primary hover:bg-gray-100 font-medium border">Previous</button>
                                                    </div>

                                                    <div class="w-1/2 text-right">
                                                        <button type="button" onclick="validateAndNext()"
                                                            class="w-32 focus:outline-none border border-transparent py-2 px-5  shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Next</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show.transition.in="step === 3" data-step="3" id="stepthree">
                                        <div class="border-b-2 pt-0">
                                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                                x-text="`Step: 3 of 3`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>
                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Treasurer Information</div>
                                                    </div>
                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">File
                                                            Uploads</div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(3 / 3 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(3 / 3 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 gap-2 mt-0">
                                            <div class="col-span-12 md:col-span-4 lg:col-span-4">
                                                <div class="mb-5 text-center">
                                                    <div
                                                        class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                                        <img id="image" class="object-cover w-full h-32 rounded-full"
                                                            :src="image" />
                                                    </div>

                                                    <label for="fileInput" type="button"
                                                        class="cursor-pointer inline-flex justify-between items-center focus:outline-none border py-2 px-4 shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <rect x="0" y="0" width="24" height="24"
                                                                stroke="none"></rect>
                                                            <path
                                                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                            <circle cx="12" cy="13" r="3" />
                                                        </svg>
                                                        Association Logo
                                                    </label>

                                                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click
                                                        to add association logo</div>
                                                    <input name="association_logo" id="fileInput" accept="image/*"
                                                        class="hidden" type="file" onchange="previewImage(this)">
                                                    <span id="association-error" class="text-red-500"></span>
                                                </div>
                                            </div>

                                            <div class="col-span-12 md:col-span-4 lg:col-span-4">
                                                <div class="mb-5 text-center">
                                                    <div
                                                        class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                                        <img id="image1" class="object-cover w-full h-32 rounded-full"
                                                            :src="image1" />
                                                    </div>

                                                    <label for="fileInput1" type="button"
                                                        class="cursor-pointer inline-flex justify-between items-center focus:outline-none border py-2 px-4 shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <rect x="0" y="0" width="24" height="24"
                                                                stroke="none"></rect>
                                                            <path
                                                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                            <circle cx="12" cy="13" r="3" />
                                                        </svg>
                                                        Affiliation Certificate from State Association
                                                    </label>

                                                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click
                                                        to add State association </div>
                                                    <input name="certificate_state" id="fileInput1" accept="image1/*"
                                                        class="hidden" type="file" onchange="previewDOBImage(this)">
                                                    <span id="certificate-error" class="text-red-500"></span>
                                                </div>
                                            </div>
                                            <div class="col-span-12">
                                                <hr class="mt-4 mb-2">
                                            </div>
                                            <div class="col-span-12">
                                                <h2 class="text-center w-full text-2xl font-bold text-danger">Disclaimer
                                                </h2>
                                                <div class="mt-2">
                                                    <div class="form-check mb-3">
                                                        <input id="radio-switch-3" class="form-check-input"
                                                            type="checkbox" name="knowledge" required>
                                                        <label class="form-check-label text-sm" for="radio-switch-3">I
                                                            certify that all the information is true to the best of my
                                                            knowledge <br>मैं प्रमाणित करता हूं कि सभी जानकारी मेरे
                                                            सर्वोत्तम ज्ञान के अनुसार सही है !</label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input id="radio-switch-4" class="form-check-input"
                                                            type="checkbox" name="discover" required>
                                                        <label class="form-check-label text-sm" for="radio-switch-4">I
                                                            agree that my IRFU UID is liable to be cancelled if at any stage
                                                            discovered any of the above informaion is incorrect <br>मैं इस
                                                            बात से सहमत हूं कि यदि किसी भी स्तर पर उपरोक्त सूचनाओं में से
                                                            कोई भी गलती निकली, तो मेरे IRFU UID को रद्द किया जा सकता
                                                            है</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-t bottom-0 left-0 right-0 py-2 mt-3">
                                                <div class="max-w-3xl mx-auto px-4">
                                                    <div class="flex justify-between">
                                                        <div class="w-1/2">
                                                            <button type="button" onclick="validateStep2()"
                                                                class="w-32 focus:outline-none py-2 px-5 shadow-sm text-center text-white bg-primary hover:bg-gray-100 font-medium border">Previous</button>
                                                        </div>
                                                                <div class="w-1/2 text-right">
                                                                    <button type="submit" onclick="validateAndNext()"
                                                                        class="w-32 focus:outline-none border border-transparent py-2 px-5  shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Submit</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / Step Content -->
                            </form>
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

