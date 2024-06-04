<?php
include("header.php");

// Include your database connection file
include("db.php");

// Check if the ID parameter is set for deletion
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // SQL to delete record
    $sql = "DELETE FROM add_properties WHERE id=$id";

    if ($connction->query($sql) === TRUE) {
        echo "Record deleted successfully";
		// header("properties.php");
    } else {
        echo "Error deleting record: " . $connction->error;
    }
}

?>

<div class="text-end">
    <a href="addproperties.php" class="btn btn-danger">Add properties</a>
</div>

<?php
// Fetch all records from the database
$sql = "SELECT * FROM add_properties";
$result = $connction->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <h6 class="mb-0 text-uppercase">DataTable Import</h6>
            </div>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Type</th>
                                <th>Registration Date</th>
                                <th>CIN No</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["company_name"] . "</td>
            <td>" . $row["type"] . "</td>
            <td>" . $row["reg_date"] . "</td>
            <td>" . $row["cin_no"] . "</td>
            <td>" . $row["address"] . "</td>
            <td><img src='" . $row["image_path"] . "' width='50'></td>
            <td>
                <a href='edit_property.php?id=" . $row["id"] . "' class='btn btn-primary'><i class='fa-solid fa-pen-to-square button text-white'></i></a>
                <a href='?action=delete&id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this property?\");'><i class='fa-solid  fa-trash button text-white'></i></a>
                <a href='view_property.php?id=" . $row["id"] . "' class='btn btn-info'><i class='fa-solid fa-eye button text-white'></i></a>
            </td>
        </tr>";
    }
    echo '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No Data";
}

$connction->close();

include("footer.php");
?>
