<?php
// Start output buffering
ob_start();
include("header.php");

// Initialize error array
$errors = [];

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    if (empty($_POST['companyname'])) {
        $errors[] = "Company name is required.";
    } else {
        $company_name = $_POST['companyname'];
    }

    if (empty($_POST['type'])) {
        $errors[] = "Type is required.";
    } else {
        $type = $_POST['type'];
    }

    if (empty($_POST['regdate'])) {
        $errors[] = "Registration date is required.";
    } else {
        $reg_date = $_POST['regdate'];
    }

    if (empty($_POST['cin'])) {
        $errors[] = "CIN number is required.";
    } else {
        $cin_no = $_POST['cin'];
    }

    if (empty($_POST['address'])) {
        $errors[] = "Address is required.";
    } else {
        $address = $_POST['address'];
    }

    if (!isset($_POST['agree'])) {
        $errors[] = "You must agree to the terms.";
    } else {
        $agree = 1;
    }

    // Validate file upload
    if ($_FILES["image_file"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors[] = "No file was uploaded.";
    } else {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["image_file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $errors[] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $errors[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image_file"]["size"] > 500000) { // limit file size to 500KB
            $errors[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1 && !move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }

    // If no errors, insert data into database
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $connction->prepare("INSERT INTO add_properties (company_name, type, reg_date, cin_no, address, image_path, agree) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $company_name, $type, $reg_date, $cin_no, $address, $target_file, $agree);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully<br>";
            header("location:properties.php");
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

$connction->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Properties</h5>
            </div>
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="input35" class="col-sm-3 col-form-label">Enter Company Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input35" name="companyname" placeholder="Enter company Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input36" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input36" name="type" placeholder="Type" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input37" class="col-sm-3 col-form-label">Reg.Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="input37" name="regdate" placeholder="Reg date" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input38" class="col-sm-3 col-form-label">CIN No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input38" name="cin" placeholder="CIN NO" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input40" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="input40" name="address" rows="3" placeholder="Address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input41" class="col-sm-3 col-form-label">Upload file</label>
                        <div class="col-sm-9">
                            <input type="file" name="image_file" id="input41" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="input42" name="agree" required>
                                <label class="form-check-label" for="input42">Check me out</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include("footer.php");
// Flush output buffer and send output to browser
ob_end_flush();
?>
