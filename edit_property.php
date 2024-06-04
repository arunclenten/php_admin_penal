<?php
// Start output buffering
ob_start();
include("header.php");

// Check if ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Get the property ID from the URL
    $property_id = $_GET['id'];

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data to update property details in the database
        $company_name = $_POST['companyname'];
        $type = $_POST['type'];
        $reg_date = $_POST['regdate'];
        $cin_no = $_POST['cin'];
        $address = $_POST['address'];

        // Check if a new image file has been uploaded
        if(isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image_file"]["name"]);

            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                // Update the image path in the database
                $image_path = $target_file;
                $sql = "UPDATE add_properties SET company_name='$company_name', type='$type', reg_date='$reg_date', cin_no='$cin_no', address='$address', image_path='$image_path' WHERE id=$property_id";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Update other property details without changing the image
            $sql = "UPDATE add_properties SET company_name='$company_name', type='$type', reg_date='$reg_date', cin_no='$cin_no', address='$address' WHERE id=$property_id";
        }

        if ($connction->query($sql) === TRUE) {
            echo "Property updated successfully";
            header("location:properties.php");
        } else {
            echo "Error updating property: " . $connction->error;
        }
    } else {
        // Fetch property details from the database based on the ID
        $sql = "SELECT * FROM add_properties WHERE id = $property_id";
        $result = $connction->query($sql);

        if ($result->num_rows > 0) {
            // Fetch property details
            $property = $result->fetch_assoc();
?>
<div class="text-end mb-3">
<a href="properties.php" class="btn btn-primary">Back</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Property</h5>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
                <div class="mb-3">
                    <label for="companyname" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="companyname" value="<?php echo $property['company_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="<?php echo $property['type']; ?>">
                </div>
                <div class="mb-3">
                    <label for="regdate" class="form-label">Registration Date</label>
                    <input type="text" class="form-control" id="regdate" name="regdate" value="<?php echo $property['reg_date']; ?>">
                </div>
                <div class="mb-3">
                    <label for="cin" class="form-label">CIN No</label>
                    <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $property['cin_no']; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"><?php echo $property['address']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image_file" class="form-label">Upload New Image</label>
                    <input type="file" class="form-control" id="image_file" name="image_file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
        } else {
            echo "Property not found.";
        }
    }
} else {
    echo "Property ID not specified.";
}

$connction->close();
include("footer.php");
// Flush output buffer and send output to browser
ob_end_flush();
?>
