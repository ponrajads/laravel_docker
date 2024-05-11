<script>
    function validateAndNext() {
        // Add your validation logic here
        // If validation fails, display error messages and return early
        if (!validateStep()) {
            return;
        }

        // Validation passed, proceed to the next step
        step++;
    }

    function validateStep() {
        // Add your validation logic for the current step here
        // Return true if validation passes, false otherwise
        // Display error messages as needed

        if (step === 1) {
            // Step 1 validation
            if (!validateStep1()) {
                return false;
            }
        }

        if (step === 2) {
            // Step 1 validation
            if (!validateStep2()) {
                return false;
            }
        }

        if (step === 3) {
            // Step 1 validation
            if (!validateStep3()) {
                return false;
            }
        }

        if (step === 4) {
            // Step 1 validation
            if (!validateStep4()) {
                return false;
            }
        }

        // Add similar checks for other steps as needed

        return true;
    }

    function validateStep1() {
        // Add validation logic for step 1 fields here
        // Return true if validation passes, false otherwise
        // Display error messages as needed

        let isValid = true;

        // Example validation: Check if the First Name is not empty
        const firstName = document.querySelector('input[name="firstname"]').value;
        if (firstName.trim() === '') {
            // Display error message
            alert('First Name cannot be empty');
            isValid = false;
        }

        // Add more validation checks for other fields as needed

        return isValid;
    }

    function validateStep2() {
        // Add validation logic for step 1 fields here
        // Return true if validation passes, false otherwise
        // Display error messages as needed

        let isValid = true;

        // Example validation: Check if the First Name is not empty
        const firstName = document.querySelector('input[name="firstname"]').value;
        if (firstName.trim() === '') {
            // Display error message
            alert('First Name cannot be empty');
            isValid = false;
        }

        // Add more validation checks for other fields as needed

        return isValid;
    }
    function validateStep3() {
        // Add validation logic for step 1 fields here
        // Return true if validation passes, false otherwise
        // Display error messages as needed

        let isValid = true;

        // Example validation: Check if the First Name is not empty
        const firstName = document.querySelector('input[name="firstname"]').value;
        if (firstName.trim() === '') {
            // Display error message
            alert('First Name cannot be empty');
            isValid = false;
        }

        // Add more validation checks for other fields as needed

        return isValid;
    }

    function validateStep4() {
        // Add validation logic for step 1 fields here
        // Return true if validation passes, false otherwise
        // Display error messages as needed

        let isValid = true;

        // Example validation: Check if the First Name is not empty
        const firstName = document.querySelector('input[name="firstname"]').value;
        if (firstName.trim() === '') {
            // Display error message
            alert('First Name cannot be empty');
            isValid = false;
        }

        // Add more validation checks for other fields as needed

        return isValid;
    }
</script>