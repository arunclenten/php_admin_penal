<?php
include("header.php");

// Check if ID is provided and it's not empty
if(isset($_GET['id']) && !empty($_GET['id'])) {
   
    // Get the ID to delete
    $id = $_GET['id'];

    // SQL to delete a record
    $sql = "DELETE FROM add_properties WHERE id=$id";

    if ($connction->query($sql) === TRUE) {
        header("properties.php");
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connction->error;
    }

    $connction->close();
} else {
    echo "Invalid request: No ID provided.";
}

include("footer.php");
?>
