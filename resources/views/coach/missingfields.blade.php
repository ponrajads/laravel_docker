@extends('layouts.player.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-2xl font-bold truncate text-primary mt-8">
    Add Mandatory Fields 
    </h2>
    <hr class="mt-4 mb-2">
    <form class="mt-4" method="post" action="{{ route('coach/missedfields') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                            <label for="email" class="form-label">Date of Birth<span class="text-red-500">*</span></label>
                                                <div class="flex flex-col sm:flex-row items-center"> 
                                                <select class="form-select form-select mt-2 mr-2" aria-label=".form-select example" name="day" required>
                                                 <option selected>Day</option>
                                                 <!-- JavaScript loop to generate options -->
                                                 <script>
                                                   for (var day = 1; day <= 31; day++) {
                                                     document.write('<option value="' + day + '" >' + day + '</option>');
                                                   }
                                                 </script>
                                               </select>
                                              
                                                    <select class="form-select form-select mt-2 mr-2" aria-label=".form-select example" name="month" required>
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
                                                    

                                                    <select class="form-select form-select mt-2" aria-label=".form-select example" name="year" required>
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
                <div class="form-group">
                    <label for="" class="form-label">Aadhar Number :<span>*</span></label>
                    <input type="text" name="aadhar" onkeypress="return onlyNumberKey(event)" placeholder="Enter Aadhar Number" minlength="12" maxlength="12" class="form-control" required>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Father Name :<span>*</span></label>
                    <input type="text" name="father_name" onkeypress="return ValidateAlpha(event)" placeholder="Enter Father Name"  class="form-control" required>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">Address Line 1<span class="text-red-500">*</span></label>
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
                                                <label for="firstname" class="form-label">Pincode<span class="text-red-500">*</span></label>
                                                <input type="text" name="pincode" onkeypress="return onlyNumberKey(event)"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" minlength="6" maxlength="6"
                                                    placeholder="Enter your Pincode...">
                                                    <span id="pincode-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">State<span class="text-red-500">*</span></label>
                                                <select data-placeholder="Select State" name="state" class="tom-select w-full">
                                                    <option value="" selected>-- Select State --</option>
                                                   <?php $states = \App\Models\MState::all(); ?>
                                                   @foreach($states as $state)
                                                   <option value="{{$state->id}}" >{{$state->stateName}} ({{$state->stateCode}})</option>
                                                   @endforeach
                                                </select>
                                                <span id="state-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">District</label>
                                                <input type="text" name="district" onkeypress="return ValidateAlpha(event)"
                                                    class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Select District...">
                                                    <span id="district-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                                                <label for="firstname" class="form-label">City</label>
                                                <input type="text" name="city" onkeypress="return ValidateAlpha(event)"
                                                    class="w-full form-control  shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                    placeholder="Enter Your City...">
                                                    <span id="city-error" class="text-red-500"></span>
                                            </div>
                                            <div class="col-span-12 md:col-span-6 lg:col-span-6">
    <label for="qualification_exam" class="form-label">Qualification Exam Passed<span class="text-red-500">*</span></label>
    <select name="qualification_exam" id="qualification_exam" class="w-full form-select shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" onchange="toggleOtherQualificationInput()">
        <option value="">-- Select --</option>
        <option value="International FIBA Level 1">International FIBA Level 1</option>
        <option value="International FIBA Level 2">International FIBA Level 2</option>
        <option value="International FIBA Level 3">International FIBA Level 3</option>
        <option value="Nationals">Nationals</option>
        <option value="Others">Others</option>
    </select>
    <span id="qualification_exam-error" class="text-red-500"></span>
</div>

<div class="col-span-12 md:col-span-6 lg:col-span-6" id="otherQualificationContainer" style="display: none;">
    <label for="other_qualification" class="form-label">Others Qualification Exam Passed</label>
    <input type="text" name="other_qualification" id="other_qualification" class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter your qualification...">
    <span id="others_qualification_exam-error" class="text-red-500"></span>
</div>

<div class="col-span-12 md:col-span-6 lg:col-span-6">
    <label for="firstname" class="form-label">Year of Passing<span class="text-red-500">*</span></label>
    <input type="text" name="year_of_passing" onkeypress="return onlyNumberKey(event)" minlength="4" maxlength="4" id="year_of_passing" class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Enter the year of passing...">
    <span id="year_of_passing-error" class="text-red-500"></span>
</div>

<div class="col-span-12 md:col-span-6 lg:col-span-6">
    <label for="firstname" class="form-label">Qualification Document<span class="text-red-500">*</span></label>
    <input type="file" name="qualification_file" id="qualification_file" class="w-full form-control shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" required accept=".jpg, .jpeg, .png">
    <span id="qualification_file-error" class="text-red-500"></span>
</div>
           
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">DOB Proof :<span>* (Accepted File Only .png,.jpg Max Upload Size 3MB)</span></label>
                    <input type="file" class="form-control" placeholder="Input inline 1" aria-label="default input inline 1" name="dob_proof" required accept=".png,.jpg,.jpeg">
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Address Proof :<span>* (Accepted File Only .png,.jpg Max Upload Size 3MB)</span></label>
                    <input type="file" class="form-control" placeholder="Input inline 1" aria-label="default input inline 1" name="address_proof" required accept=".png,.jpg,.jpeg">
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-2">
        <div id="icon-button" class="py-5">
            <div class="preview">
                <div class="flex flex-wrap justify-center">
                    
                    <button type="submit" class="btn btn-success text-white w-32 mr-2 mb-2">Submit</button>
                </div>
            </div>
        </div>
    </form>

   
</div>
<!-- END: Content -->
<script>
function toggleOtherQualificationInput() {
        var qualificationSelect = document.getElementById('qualification_exam');
        var otherQualificationContainer = document.getElementById('otherQualificationContainer');

        if (qualificationSelect.value === 'Others') {
            otherQualificationContainer.style.display = 'block';
        } else {
            otherQualificationContainer.style.display = 'none';
            // Clear the value if not 'Others' is selected
            document.getElementById('other_qualification').value = '';
            // Clear any error message if present
            document.getElementById('others_qualification_exam-error').innerText = '';
        }
    }
    </script>
@endsection