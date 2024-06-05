<?php
// Establish database connection
include('config/dbcon.php');

// Query to fetch count of groups in each field
$group_query = "SELECT field, COUNT(name) AS group_count FROM groups GROUP BY field";
$group_query_run = mysqli_query($conn, $group_query); // Changed $con to $conn

$data = array();

if ($group_query_run) {
    // Fetch data and store in an associative array
    while($row = mysqli_fetch_assoc($group_query_run)) {
        $data[] = array(
            'fieldName' => $row['field'],
            'groupCount' => $row['group_count']
        );
    }
}

// Convert PHP array to JSON format
echo json_encode($data);

// Close connection
$conn->close();
?>
