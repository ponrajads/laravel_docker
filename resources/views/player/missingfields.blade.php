@extends('layouts.player.dashboard.header')
@section('content')

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="text-2xl font-bold truncate text-primary mt-8">
    Add Mandatory Fields 
    </h2>
    <hr class="mt-4 mb-2">
    <form class="mt-4" method="post" action="{{ route('player/missedfields') }}" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="" class="form-label">Father Mobile :<span>*</span></label>
                    <input type="text" name="father_mobile" maxlength="10" minlength="10" onkeypress="return onlyNumberKey(event)" placeholder="Enter Father Mobile Number" class="form-control" required>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Address :<span>*</span></label>
                    <textarea name="address" id="" cols="30" rows="2" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-6">
                <div class="form-group">
                    <label for="" class="form-label">Pincode :<span>*</span></label>
                    <input type="text" name="pincode" onkeypress="return onlyNumberKey(event)" maxlength="6" minlength="6" placeholder="Enter Pincode"  class="form-control" required>
                </div>
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

@endsection