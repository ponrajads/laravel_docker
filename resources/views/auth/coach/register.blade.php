@extends('layouts.auth.coach.register')
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
                        Already You have an account? <br><a href="{{ route('login') }}" class="underline text-warning">Login
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
                                    x-text="`Step: 1 of 5`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1 w-3/5">
                                        <div data-step="1">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">Personal Information
                                            </div>
                                        </div>

                                        <div data-step="2">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                Address Information</div>
                                        </div>

                                        <div data-step="3">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                Association &amp; Bank Details</div>
                                        </div>
                                        <div data-step="4">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                Qualification Details</div>
                                        </div>
                                        <div data-step="5">
                                            <div class="text-lg font-bold text-gray-700 leading-tight" style="display:none">
                                                File Uploads</div>
                                        </div>
                                    </div>

                                    <div class="flex items-center w-2/5">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                :style="'width: ' + parseInt(step / 5 * 100) + '%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 5 * 100) +'%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Top Navigation -->
                            <form action="{{ route('coach/store') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateStep5();">
                                @csrf
                                <!-- Step Content -->
                                <div class="pt-5">
                                    <div x-show.transition.in="step === 1" data-step="1" id="steponestep">
                                        <div class="grid grid-cols-12 gap-4 mt-2">
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">First Name<span
                                                        class="text-red-500">*</span></label>
                                                <input type="text"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    name="firstname" value="{{ old('firstname') }}"
                                                    placeholder="Enter your firstname..."
                                                    onkeypress="return ValidateAlpha(event)">
                                                <span id="firstname-error" class="text-red-500"></span>
                                                @error('firstname')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">Last Name</label>
                                                <input type="text"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your lastname..."
                                                    onkeypress="return ValidateAlpha(event)" name="lastname"
                                                    value="{{ old('lastname') }}">
                                                <span id="lastname-error" class="text-red-500"></span>
                                                @error('lastname')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="father_name" class="form-label">Father Name<span
                                                        class="text-red-500">*</span></label>
                                                <input type="text"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your Father Name..."
                                                    onkeypress="return ValidateAlpha(event)" name="father_name"
                                                    value="{{ old('father_name') }}">
                                                <span id="father_name-error" class="text-red-500"></span>
                                                @error('father_name')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Gender<span
                                                        class="text-red-500">*</span></label>
                                                <div class="flex">
                                                    <label
                                                        class="flex justify-start items-center text-truncate  bg-white pl-4 pr-6 py-3 shadow-sm mr-4 w-1/2 cursor-pointer">
                                                        <div class="text-teal-600 mr-3">
                                                            <input type="radio" name="gender" value="Male"
                                                                class="form-radio focus:outline-none focus:shadow-outline" />
                                                        </div>
                                                        <div class="select-none text-gray-700">Male</div>
                                                    </label>

                                                    <label
                                                        class="flex justify-start items-center text-truncate  bg-white pl-4 pr-6 py-3 shadow-sm w-1/2 cursor-pointer">
                                                        <div class="text-teal-600 mr-3">
                                                            <input type="radio" name="gender" value="Female"
                                                                class="form-radio focus:outline-none focus:shadow-outline" />
                                                        </div>
                                                        <div class="select-none text-gray-700">Female</div>
                                                    </label>
                                                </div>
                                                <span id="gender-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Date of Birth<span
                                                        class="text-red-500">*</span></label>
                                                <div class="flex flex-col sm:flex-row items-center">
                                                    <select class="form-select form-select mt-2 mr-2"
                                                        aria-label=".form-select example" name="day">
                                                        <option selected>Day</option>
                                                        <!-- JavaScript loop to generate options -->
                                                        <script>
                                                            for (var day = 1; day <= 31; day++) {
                                                                document.write('<option value="' + day + '" >' + day + '</option>');
                                                            }
                                                        </script>
                                                    </select>

                                                    <select class="form-select form-select mt-2 mr-2"
                                                        aria-label=".form-select example" name="month">
                                                        <option selected>Month</option>
                                                        <option value="01">January</option>
                                                        <option value="02">February</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>


                                                    <select class="form-select form-select mt-2"
                                                        aria-label=".form-select example" name="year">
                                                        <option selected>Year</option>
                                                        <!-- Use a loop to generate options from 1951 to 2015 -->
                                                        <?php
                                                        for ($year = 1951; $year <= 2015; $year++) {
                                                            echo "<option value=\"$year\">$year</option>";
                                                        }
                                                        ?>
                                                    </select>



                                                </div>
                                                <span id="day-error" class="text-red-500"></span>
                                                <span id="month-error" class="text-red-500"></span>
                                                <span id="year-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Blood Group</label>
                                                <select class="form-select mt-0 sm:mr-2" name="blood_group"
                                                    aria-label="Default select example" id="bloodGroup">
                                                    <option selected="" disabled="">Select Your Blood Group</option>
                                                    <option value="1"
                                                        @if (old('blood_group') == 1) selected @endif>A negative (A-)
                                                    </option>
                                                    <option value="2"
                                                        @if (old('blood_group') == 2) selected @endif>A positive (A+)
                                                    </option>
                                                    <option value="3"
                                                        @if (old('blood_group') == 3) selected @endif>AB negative (AB-)
                                                    </option>
                                                    <option value="4"
                                                        @if (old('blood_group') == 4) selected @endif>AB positive (AB+)
                                                    </option>
                                                    <option value="5"
                                                        @if (old('blood_group') == 5) selected @endif>B negative (B-)
                                                    </option>
                                                    <option value="6"
                                                        @if (old('blood_group') == 6) selected @endif>B positive (B+)
                                                    </option>
                                                    <option value="7"
                                                        @if (old('blood_group') == 7) selected @endif>O negative (O-)
                                                    </option>
                                                    <option value="8"
                                                        @if (old('blood_group') == 8) selected @endif>O positive (O+)
                                                    </option>
                                                </select>

                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Email<span
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
                                                <label for="email" class="form-label">Mobile Number</label>
                                                <input type="tel" onkeyup="checkMobileExist()"
                                                    onkeypress="return onlyNumberKey(event)" name="mobile" maxlength="10"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your mobile number..." id="mobile">
                                                <span id="mobile-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Re-enter Mobile Number</label>
                                                <input type="tel" onkeypress="return onlyNumberKey(event)"
                                                    name="re-mobile" maxlength="10"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your mobile number..." id="re-mobile">
                                                <span id="re-mobile-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">Aadhar Card Number<span
                                                        class="text-red-500">*</span></label>
                                                <input type="text" onkeypress="return onlyNumberKey(event)"
                                                    name="aadhar" maxlength="12"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your Aadhar card number..." minlength="12"
                                                    maxlength="12" id="aadhar">
                                                <span id="aadhar-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="email" class="form-label">NSRS ID No<span
                                                        class="text-red-500"></span></label>
                                                <input type="text" onkeypress="return onlyNumberKey(event)"
                                                    name="nsrs_no" minlength="12" maxlength="12"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter your NSRS ID number..." id="aadhar">
                                                {{-- <span id="aadhar-error" class="text-red-500"></span> --}}
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

                                    <div x-show.transition.in="step === 2" data-step="2" id="steptwo"
                                        style="margin-top: -3%">
                                        <div class="border-b-2 pt-0">
                                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                                x-text="`Step: 2 of 5`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>

                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">Address
                                                            Information</div>
                                                    </div>

                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Association &amp; Bank Details</div>
                                                    </div>
                                                    <div data-step="4">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Qualification Details</div>
                                                    </div>
                                                    <div data-step="5">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">File Uploads</div>
                                                    </div>
                                                </div>

                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(2 / 5 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(2 / 5 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <div class="grid grid-cols-12 gap-2 mt-0">

                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending underline">Permanent Address
                                                    </h2>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Address Line 1<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="address1"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Address Line 1...">
                                                    <span id="address1-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Address Line 2</label>
                                                    <input type="text" name="address2"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Address Line 2...">
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
                                                    <label for="firstname" class="form-label">District</label>
                                                    <input type="text" name="district"
                                                        onkeypress="return ValidateAlpha(event)"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter District...">
                                                    <span id="district-error" class="text-red-500"></span>
                                                </div>
												<div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">State<span
                                                            class="text-red-500">*</span></label>
                                                    <select name="state" id="state"
                                                        class="tom-select w-full">
                                                        <option value="" selected>-- Select State --</option>
                                                        <?php $states = \App\Models\MState::all(); ?>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->stateName }}
                                                                ({{ $state->stateCode }})</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="state-error" class="text-red-500"></span>
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

                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending">Communication Address
                                                        &nbsp;&nbsp;<span class="text-red-500"
                                                            style="text-decoration: none">(
                                                            <input type="checkbox"
                                                                id="sameAddressCheckbox">&nbsp;&nbsp;<label
                                                                for="sameAddress">Same as Permanent Address</label>)</span>
                                                    </h2>
                                                </div>

                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Address Line 1</label>
                                                    <input type="text" name="caddress1"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Address Line 1...">
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Address Line 2</label>
                                                    <input type="text" name="caddress2"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Address Line 2...">
                                                </div>
												<div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">City</label>
                                                    <input type="text" name="ccity"
                                                        onkeypress="return ValidateAlpha(event)"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Your City...">
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">District</label>
                                                    <input type="text" name="cdistrict"
                                                        onkeypress="return ValidateAlpha(event)"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Select District...">
                                                </div>
												<div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">State</label>
                                                    <select data-placeholder="Select State" name="cstate"
                                                        class="tom-select w-full">
                                                        <option value="" selected>-- Select State --</option>
                                                        <?php $states = \App\Models\MState::all(); ?>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">{{ $state->stateName }}
                                                                ({{ $state->stateCode }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
												<div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Pincode</label>
                                                    <input type="text" name="cpincode" minlength="6" maxlength="6"
                                                        onkeypress="return onlyNumberKey(event)"
                                                        class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter your Pincode...">
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
                                                x-text="`Step: 3 of 5`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>

                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Address Information</div>
                                                    </div>

                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">
                                                            Association &amp; Bank Details</div>
                                                    </div>

                                                    <div data-step="4">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Qualification Details</div>
                                                    </div>
                                                    <div data-step="5">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">File Uploads</div>
                                                    </div>
                                                </div>

                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(3 / 5 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(3 / 5 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <div class="grid grid-cols-12 gap-2 mt-0">
                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending underline">Home Association
                                                    </h2>
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
                                                <div class="col-span-12">
                                                    <hr class="mt-4 mb-2">
                                                </div>
                                                <div class="col-span-12">
                                                    <h2 class="text-xl font-bold text-pending underline">Bank Details</h2>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Bank Name</label>
                                                    <select name="bank_name" id="bank_name" class="form-control">
                                                        <option value="">Select Bank Name</option>
                                                        <?php $mbank = \App\Models\Mbank::all(); ?>
                                                        @foreach ($mbank as $mbank)
                                                            <option value="{{ $mbank->id }}">{{ $mbank->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span id="bank_name-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Branch</label>
                                                    <input type="text" onkeypress="return ValidateAlpha(event)"
                                                        name="branch"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Branch...">
                                                    <span id="branch-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Account Number</label>
                                                    <input type="text" onkeypress="return onlyNumberKey(event)"
                                                        name="account_number"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter Account number...">
                                                    <span id="account_number-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Re-enter Account
                                                        number</label>
                                                    <input type="text" onkeypress="return onlyNumberKey(event)"
                                                        name="re_account_number"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Re-enter Account number...">
                                                    <span id="re_account_number-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">IFSC Code</label>
                                                    <input type="text" onkeypress="return ValidateAlphaNumaric(event)"
                                                        name="ifsc"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter IFSC Code...">
                                                    <span id="ifsc-error" class="text-red-500"></span>
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
                                                        <button type="button" onclick="validateAndNext()"
                                                            class="w-32 focus:outline-none border border-transparent py-2 px-5  shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Next</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show.transition.in="step === 4" data-step="4" id="stepfour">
                                        <div class="border-b-2 pt-0">
                                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                                x-text="`Step: 4 of 5`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>

                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Address Information</div>
                                                    </div>

                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Association &amp; Bank Details</div>
                                                    </div>

                                                    <div data-step="4">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">
                                                            Qualification Details</div>
                                                    </div>
                                                    <div data-step="5">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">File Uploads</div>
                                                    </div>
                                                </div>

                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(4 / 5 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(4 / 5 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <div class="grid grid-cols-12 gap-2 mt-0">


                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="official_type" class="form-label">Official Type
                                                        <span class="text-red-500">*</span></label>
                                                    <select name="official_type" id="official_type"
                                                        class="w-full form-select shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        onchange="toggleOtherQualificationInput()">
                                                        <option value="">-- Select --</option>
                                                        <option value="Technical">Technical</option>
                                                        <option value="Others">Coaching</option>
                                                    </select>
                                                    <span id="qualification_exam-error" class="text-red-500"></span>
                                                </div>

                                                <div class="col-span-12 md:col-span-6 lg:col-span-6"
                                                    id="otherQualificationContainer" style="display: none;">
                                                    <label for="place_of_coaching" class="form-label">
                                                        Place Of Coaching</label>
                                                    <input type="text" name="place_of_coaching"
                                                        id="place_of_coaching"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter your Place Of Coaching...">
                                                    <span id="others_qualification_exam-error"
                                                        class="text-red-500"></span>
                                                </div>

                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Date of Certification<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="date" name="date_of_certificate"
                                                        onkeypress="return onlyNumberKey(event)"
                                                      id="date_of_certificate"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter the Date of Certification...">
                                                    <span id="year_of_passing-error" class="text-red-500"></span>
                                                </div>
                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Certification Passed<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="certification_passing"
                                                        onkeypress="return onlyNumberKey(event)" minlength="4"
                                                        maxlength="4" id="certification_passing"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        placeholder="Enter the Certification passing...">
                                                    <span id="year_of_passing-error" class="text-red-500"></span>
                                                </div>

                                                <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                    <label for="firstname" class="form-label">Qualification Document<span
                                                            class="text-red-500">*</span></label>
                                                    <input type="file" name="qualification_file"
                                                        id="qualification_file"
                                                        class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                        required accept=".jpg, .jpeg, .png">
                                                    <span id="qualification_file-error" class="text-red-500"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-t bottom-0 left-0 right-0 py-2 mt-3">
                                            <div class="max-w-3xl mx-auto px-4">
                                                <div class="flex justify-between">
                                                    <div class="w-1/2">
                                                        <button type="button" onclick="validateStep3()"
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
                                    <div x-show.transition.in="step === 5" data-step="5" id="stepfive">
                                        <div class="border-b-2 pt-0">
                                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                                x-text="`Step: 5 of 5`"></div>
                                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                <div class="flex-1 w-3/5">
                                                    <div data-step="1">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Personal Information</div>
                                                    </div>
                                                    <div data-step="2">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Address Information</div>
                                                    </div>

                                                    <div data-step="3">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Association &amp; Bank Details</div>
                                                    </div>
                                                    <div data-step="4">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight"
                                                            style="display:none">Qualification Details</div>
                                                    </div>
                                                    <div data-step="5">
                                                        <div class="text-lg font-bold text-gray-700 leading-tight">File
                                                            Uploads</div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center w-2/5">
                                                    <div class="w-full bg-white rounded-full mr-2">
                                                        <div class="rounded-full bg-success text-xs leading-none h-2 text-center text-white"
                                                            :style="'width: ' + parseInt(5 / 5 * 100) + '%'"></div>
                                                    </div>
                                                    <div class="text-xs w-10 text-gray-600"
                                                        x-text="parseInt(5 / 5 * 100) +'%'"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-12 gap-2 mt-0">
                                            <div class="col-span-12 md:col-span-4 lg:col-span-4">
                                                <div class="mb-5 text-center">
                                                    <div
                                                        class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                                        <img id="image" class="object-cover w-full h-32 rounded-full"
                                                            :src="image1" />
                                                    </div>
                                                    <label for="fileInput"
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
                                                        Photograph
                                                    </label>
                                                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click
                                                        to add profile picture</div>

                                                    <input name="photo" id="fileInput" accept="image/*" class="hidden"
                                                        type="file" onchange="previewImage(this)">
                                                    <span id="photograph-error" class="text-xs text-red-500"></span>
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
                                                        DOB Proof
                                                    </label>
                                                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click
                                                        to add DOB Proof</div>
                                                    <input name="dob_proof" id="fileInput1" accept="image1/*"
                                                        class="hidden" type="file" onchange="previewDOBImage(this)">
                                                    <span id="dob_proof-error" class="text-red-500"></span>
                                                </div>
                                            </div>
                                            <div class="col-span-12 md:col-span-4 lg:col-span-4">
                                                <div class="mb-5 text-center">
                                                    <div
                                                        class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                                        <img id="image2" class="object-cover w-full h-32 rounded-full"
                                                            :src="image2" />
                                                    </div>
                                                    <label for="fileInput2" type="button"
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
                                                        Identity Proof
                                                    </label>
                                                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click
                                                        to add Identity Proof</div>
                                                    <input name="address_proof" id="fileInput2" accept="image2/*"
                                                        class="hidden" type="file"
                                                        onchange="previewAddressProofImage(this)">
                                                    <span id="address_proof-error" class="text-red-500"></span>
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
                                                            discovered any of the above informaion is incorrect<br>मैं इस
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
                                                            <button type="button" onclick="validateStep4()"
                                                                class="w-32 focus:outline-none py-2 px-5 shadow-sm text-center text-white bg-primary hover:bg-gray-100 font-medium border">Previous</button>
                                                        </div>

                                                        <div class="w-1/2 text-right">
                                                            <button type="submit" onclick="validateAndNext()"
                                                                class="w-32 focus:outline-none border border-transparent py-2 px-5 shadow-sm text-center text-white bg-pending hover:bg-blue-600 font-medium">Submit</button>

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
