<?php
// Connect to your database
include('config/dbcon.php');

// Create connection

// Fetch data from the database including the field (filière) column
$sql = "SELECT field, COUNT(name) as group_count FROM groups GROUP BY field";
$result = $con->query($sql);

// Format data for chart
$dataPoints = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataPoints[] = array("label" => $row["field"], "y" => intval($row["group_count"]));
    }
} else {
    echo "0 results";
}

$con->close();
?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Number of Groups in each Level in Departement "
    },
    axisY:{
        includeZero: true,
        title: "Number of Groups"
    },
    data: [{
        type: "column",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
