<?php
include("header.php");

// Check if ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Get the property ID from the URL
    $property_id = $_GET['id'];

    // Fetch property details from the database based on the ID
    $sql = "SELECT * FROM add_properties WHERE id = $property_id";
    $result = $connction->query($sql);

    if ($result->num_rows > 0) {
        // Fetch property details
        $property = $result->fetch_assoc();

        // Display property details
        echo '
        <div class="text-end mb-3">
<a href="properties.php" class="btn btn-primary">Back</a>
</div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Property Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Company Name:</strong> '.$property['company_name'].'</li>
                        <li class="list-group-item"><strong>Type:</strong> '.$property['type'].'</li>
                        <li class="list-group-item"><strong>Registration Date:</strong> '.$property['reg_date'].'</li>
                        <li class="list-group-item"><strong>CIN No:</strong> '.$property['cin_no'].'</li>
                        <li class="list-group-item"><strong>Address:</strong> '.$property['address'].'</li>
                        <li class="list-group-item"><strong>Image:</strong> <img src="'.$property['image_path'].'" width="100"></li>
                    </ul>
                </div>
            </div>
        </div>';
    } else {
        echo "Property not found.";
    }
} else {
    echo "Property ID not specified.";
}

$connction->close();
?>

<?php
include("footer.php");
?>
