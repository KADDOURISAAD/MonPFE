<?php
include('authentication.php');

$field_name = $_GET['field_name'] ?? '';
$semester = $_GET['semester'] ?? '';

$date = $_GET['date'] ?? '';

$lesson = $_GET['lesson'] ?? '';
// Escaping the variables for security reasons
$field_name = mysqli_real_escape_string($con, $field_name);
$semester = mysqli_real_escape_string($con, $semester);

$date = mysqli_real_escape_string($con, $date);

$lesson = mysqli_real_escape_string($con, $lesson);



$check_ExamModule_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND Module='$lesson' ";
$check_ExamModule_query_run = mysqli_query($con, $check_ExamModule_query);
if (mysqli_num_rows($check_ExamModule_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "This exam is already exist in exams timtable."]);
    exit;
}

// Vérifier la disponibilité du créneau horaire
$check_ExamDate_query = "SELECT * FROM exams WHERE  Field='$field_name'  AND Semester='$semester' AND ExamDate='$date'  ";
$check_ExamDate_query_run = mysqli_query($con, $check_ExamDate_query);

if (mysqli_num_rows($check_ExamDate_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "This date is already used in exams timtable."]);
    exit;
}




// Vérifier la disponibilité du professeur


echo json_encode(['status' => 'success']);
