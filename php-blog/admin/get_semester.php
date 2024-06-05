<?php
// get_groups.php

// Include the database configuration
include('config/dbcon.php');

// Retrieve the field selected from the GET request
$semester = $_GET['semester'];

// Escape input to prevent SQL injection (ensure to sanitize input data in production)
$semester = mysqli_real_escape_string($con, $semester);

// Query to retrieve the courses corresponding to the selected semester
$lesson_query = "SELECT semester,course_name,has_course,has_tp, has_td FROM courses WHERE semester = '$semester' ORDER BY semester";
$lesson_query_run = mysqli_query($con, $lesson_query);

// Check if the query was successful
if ($lesson_query_run) {
    $lessons = array();
    // Loop through the results and store the course names in an array
    while ($lesson_row = mysqli_fetch_assoc($lesson_query_run)) {
        if ($lesson_row['has_course'] == 1) {
            $lessons[] = 'Cours-' . $lesson_row['course_name'].'-' . $lesson_row['semester'];
        }
        // Check if has_tp is 1, if true, add TP row
        if ($lesson_row['has_tp'] == 1) {
            $lessons[] = 'TP-' . $lesson_row['course_name'].'-' . $lesson_row['semester'];;
        }
        // Check if has_td is 1, if true, add TD row
        if ($lesson_row['has_td'] == 1) {
            $lessons[] = 'TD-' . $lesson_row['course_name'].'-' . $lesson_row['semester'];;
        }
    }
    // Return the lessons in JSON format
    echo json_encode($lessons);
} else {
    // Return an error response if the query fails
    echo json_encode(array('error' => 'Unable to fetch lessons'));
}
?>
