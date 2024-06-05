<?php
// Connect to your database
include('config/dbcon.php');

// Create connection

// Fetch data from the database including the field (filière) column
$sql = "SELECT name, student_number, field FROM groups";
$result = $con->query($sql);

// Format data for chart
$dataPoints = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fieldName = $row["field"];
        if (!isset($dataPoints[$fieldName])) {
            $dataPoints[$fieldName] = array();
        }
        $dataPoints[$fieldName][] = array("label" => $row["name"], "y" => intval($row["student_number"]));
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
        text: "Student Numbers by Group and Field"
    },
    axisY:{
        includeZero: true
    },
    data: [
        <?php 
        foreach ($dataPoints as $field => $groups) {
            echo "{";
            echo "type: 'column',";
            echo "name: '$field',";
            echo "showInLegend: true,";
            echo "dataPoints: " . json_encode($groups, JSON_NUMERIC_CHECK);
            echo "},";
        }
        ?>
    ]
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

<?php
 
$dataPoints = array(
    array("x"=> 10, "y"=> 41),
    array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
    array("x"=> 30, "y"=> 50),
    array("x"=> 40, "y"=> 45),
    array("x"=> 50, "y"=> 52),
    array("x"=> 60, "y"=> 68),
    array("x"=> 70, "y"=> 38),
    array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
    array("x"=> 90, "y"=> 52),
    array("x"=> 100, "y"=> 60),
    array("x"=> 110, "y"=> 36),
    array("x"=> 120, "y"=> 49),
    array("x"=> 130, "y"=> 41)
);
    
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
        text: "Simple Column Chart with Index Labels"
    },
    axisY:{
        includeZero: true
    },
    data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",   
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
