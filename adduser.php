<?php
include("header.php");
include("db.php");

// Step 2: Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $profession = $_POST["profession"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $source = $_POST["source"];
    $aadhar_card = $_FILES["aadhar_card"]["name"];
    $pan_card = $_FILES["pan_card"]["name"];
    $passport_photo = $_FILES["passport_photo"]["name"];
    $referral_id = $_POST["referral_id"];
    $referral_name = $_POST["referral_name"];
    $type = $_POST["type"];
    $address = $_POST["address"];

    // Upload directory for images
    $target_dir = "uploads/";

    // Move uploaded files to the upload directory
    move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], $target_dir . $aadhar_card);
    move_uploaded_file($_FILES["pan_card"]["tmp_name"], $target_dir . $pan_card);
    move_uploaded_file($_FILES["passport_photo"]["tmp_name"], $target_dir . $passport_photo);

    // Step 3: Sanitize and validate the data (not implemented in this example)

    // Step 4: Insert the data into the database
    $sql = "INSERT INTO users (name, phone, email, profession, gender, dob, source, aadhar_card, pan_card, passport_photo, referral_id, referral_name, type, address) 
            VALUES ('$name', '$phone', '$email', '$profession', '$gender', '$dob', '$source', '$aadhar_card', '$pan_card', '$passport_photo', '$referral_id', '$referral_name', '$type', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Step 5: Close the database connection
$conn->close();

?>

<!-- Your HTML form goes here -->
<!-- Remember to set the form method to POST and enctype to multipart/form-data -->
<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-header px-4 py-3">
            <h5 class="mb-0">USERS </h5>
        </div>
        <div class="card-body p-4">
            <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="bsValidation1" name="name" placeholder="Name" value="" required>
                </div>
                <div class="col-md-12">
                    <label for="bsValidation3" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="bsValidation3" name="phone" placeholder="Phone" required>
                </div>
                <div class="col-md-12">
                    <label for="bsValidation4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="bsValidation4" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-12">
                    <label for="bsValidation5" class="form-label">Profession</label>
                    <input type="text" class="form-control" id="bsValidation5" name="profession" placeholder="Profession" required>
                </div>
                <div class="col-md-6 mt-lg-5">
                    <div class="d-flex align-items-center gap-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="bsValidation6" name="gender" value="Male" required>
                            <label class="form-check-label" for="bsValidation6">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="bsValidation7" name="gender" value="Female" required>
                            <label class="form-check-label" for="bsValidation7">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="bsValidation8" class="form-label">DOB</label>
                    <input type="date" class="form-control" id="bsValidation8" name="dob" placeholder="Date of Birth" required>
                </div>
                <div class="col-md-6">
                    <label for="bsValidation9" class="form-label">Source</label>
                    <select id="bsValidation9" class="form-select" name="source" required>
                        <option selected="" disabled="" value="">Choose</option>
                        <option>Direct</option>
                        <option>Referral</option>
                        <option>Social Media</option>
                        <option>Manual Paper</option>
                        <option>Manual Sun pack</option>
                        <option>Manual Banner</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="aadhar_card" class="form-label">Aadhar card</label>
                    <input class="form-control" type="file" id="aadhar_card" name="aadhar_card">
                </div>
                <div class="col-md-6">
                    <label for="pan_card" class="form-label">Pan card</label>
                    <input class="form-control" type="file" id="pan_card" name="pan_card">
                </div>
                <div class="col-md-6">
                    <label for="passport_photo" class="form-label">Passport Photo</label>
                    <input class="form-control" type="file" id="passport_photo" name="passport_photo">
                </div>
                <div class="col-md-6">
                    <label for="bsValidation11" class="form-label">Referral ID</label>
                    <select id="selectOption" class="form-select" name="referral_id" required>
                        <option selected="" disabled="" value="">Choose...</option>
                        <option value="option1" data-fill="Value 1">Option 1</option>
                        <option value="option2" data-fill="Value 2">Option 2</option>
                        <option value="option3" data-fill="Value 3">Option 3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="referral_name" class="form-label">Referral Name</label>
                    <input type="text" class="form-control" id="referral_name" name="referral_name" placeholder="Referral Name">
                </div>
                <div class="col-md-6">
                    <label for="bsValidation9" class="form-label">Type</label>
                    <select id="bsValidation9" class="form-select" name="type" required>
                        <option selected="" disabled="" value="">Choose</option>
                        <option>Manual user</option>
                        <option>Mediator</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="bsValidation13" class="form-label">Address</label>
                    <textarea class="form-control" id="bsValidation13" name="address" placeholder="Address ..." rows="3" required></textarea>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bsValidation14" required>
                        <label class="form-check-label" for="bsValidation14">Agree to terms and conditions</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid justify-content-center gap-3">
                        <button type="submit" class="btn btn-primary px-4 ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
