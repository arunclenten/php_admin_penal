<?php
include("header.php");
?>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-header px-4 py-3">
            <h5 class="mb-0">USERS </h5>
        </div>
        <div class="card-body p-4">
            <form class="row g-3 needs-validation " novalidate="">
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="bsValidation1" placeholder="Name" value="" required="">
                    <!-- <div class="valid-feedback">
											Looks good!
										  </div> -->
                </div>
                <div class="col-md-12">
                    <label for="bsValidation3" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="bsValidation3" placeholder="Phone" required="">
                    <!-- <div class="invalid-feedback">
											Please choose a username.
										  </div> -->
                </div>
                <div class="col-md-12">
                    <label for="bsValidation4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="bsValidation4" placeholder="Email" required="">
                    <!-- <div class="invalid-feedback">
											Please provide a valid email.
										  </div> -->
                </div>
                <div class="col-md-12">
                    <label for="bsValidation5" class="form-label">Profession</label>
                    <input type="password" class="form-control" id="bsValidation5" placeholder="Profession" required="">
                    <!-- <div class="invalid-feedback">
											Please choose a password.
										</div> -->
                </div>
                <div class="col-md-6 mt-lg-5">
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                            <label class="form-check-label" for="bsValidation6">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                            <label class="form-check-label" for="bsValidation7">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="bsValidation8" class="form-label">DOB</label>
                    <input type="date" class="form-control" id="bsValidation8" placeholder="Date of Birth" required="">
                    <!-- <div class="invalid-feedback">
											Please select date.
										</div> -->
                </div>
                <div class="col-md-6">
                    <label for="bsValidation9" class="form-label">Source</label>
                    <select id="bsValidation9" class="form-select" required="">
                        <option selected="" disabled="" value="">Choose</option>
                        <option>Direct</option>
                        <option>Referal</option>
                        <option>Social Media</option>
                        <option>Manual Paper</option>
                        <option>Manual Sun pack</option>
                        <option>Manual Baner</option>

                    </select>
                    <!-- <div class="invalid-feedback">
										   Please select a valid country.
										</div> -->
                </div>
                <div class="col-md-6">
                    <label for="formFile" class="form-label">Aadhar card</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-md-6">
                    <label for="formFile" class="form-label">Pan card</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="col-md-6">
                    <label for="formFile" class="form-label">Passport Photo</label>
                    <input class="form-control" type="file" id="formFile">
                </div>

                <div class="col-md-6">
                    <label for="bsValidation11" class="form-label">Refferal ID</label>
                    <select id="selectOption" class="form-select" required="">
                        <option selected="" disabled="" value="">Choose...</option>
                        <option value="option1" data-fill="Value 1">Option 1</option>
                        <option value="option2" data-fill="Value 2">Option 2</option>
                        <option value="option3" data-fill="Value 3">Option 3</option>
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="formFile" class="form-label">Refferal Name</label>
                    <input type="text" class="form-control" id="autoFillInput" placeholder="Refferal Name">
                </div>
                <div class="col-md-6">
                    <label for="bsValidation9" class="form-label">Type</label>
                    <select id="bsValidation9" class="form-select" required="">
                        <option selected="" disabled="" value="">Choose</option>
                        <option>Manual user</option>
                        <option>Mediator</option>
                    </select>
                    <!-- <div class="invalid-feedback">
										   Please select a valid country.
										</div> -->
                </div>



                <div class="col-md-12">
                    <label for="bsValidation13" class="form-label">Address</label>
                    <textarea class="form-control" id="bsValidation13" placeholder="Address ..." rows="3" required=""></textarea>
                    <!-- <div class="invalid-feedback">
											Please enter a valid address.
										</div> -->
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bsValidation14" required="">
                        <label class="form-check-label" for="bsValidation14">Agree to terms and conditions</label>
                        <!-- <div class="invalid-feedback">
												You must agree before submitting.
											  </div> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid justify-content-center gap-3">
                        <button type="submit" class="btn btn-primary px-4 ">Submit</button>
                        <!-- <button type="reset" class="btn btn-light px-4">Reset</button> -->
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    // Get references to the select and input elements
    const selectElement = document.getElementById('selectOption');
    const inputElement = document.getElementById('autoFillInput');

    // Add event listener to the select element
    selectElement.addEventListener('change', function() {
        // Get the selected option's data-fill attribute
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const fillValue = selectedOption.getAttribute('data-fill');

        // Set the input field's value to the selected option's data-fill attribute
        inputElement.value = fillValue;
    });
</script>
<?php
include("footer.php");
?>