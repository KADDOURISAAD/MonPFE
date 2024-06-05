<?php
include('config/dbcon.php');
// Query to fetch room counts by type
$sql = "SELECT room_type, COUNT(*) AS count FROM rooms GROUP BY room_type";
$result = $conn->query($sql);

// Initialize arrays to store labels and counts
$labels = [];
$counts = [];

// Fetch data and populate arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["room_type"];
        $counts[] = $row["count"];
    }
}

// Close connection
$conn->close();

// Create associative array to hold labels and counts
$data = array(
    "labels" => $labels,
    "counts" => $counts
);

// Convert array to JSON and output
echo json_encode($data);
?>
