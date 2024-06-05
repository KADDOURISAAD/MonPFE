<?php
include('authentication.php');

$field_name = $_GET['field_name'] ?? '';
$semester = $_GET['semester'] ?? '';
$teacher = $_GET['teacher'] ?? '';
$group = $_GET['group'] ?? '';
$time = $_GET['time'] ?? '';
$day = $_GET['day'] ?? '';
$room = $_GET['room'] ?? '';
$lesson = $_GET['lesson'] ?? '';
// Escaping the variables for security reasons
$field_name = mysqli_real_escape_string($con, $field_name);
$semester = mysqli_real_escape_string($con, $semester);
$teacher = mysqli_real_escape_string($con, $teacher);
$group = mysqli_real_escape_string($con, $group);
$time = mysqli_real_escape_string($con, $time);
$day = mysqli_real_escape_string($con, $day);
$room = mysqli_real_escape_string($con, $room);
$lesson = mysqli_real_escape_string($con, $lesson);



$check_lesson_query = "SELECT * FROM timetable WHERE field='$field_name' AND lesson='$lesson' AND semester='$semester' AND group_name='$group'";
$check_lesson_query_run = mysqli_query($con, $check_lesson_query);
if (mysqli_num_rows($check_lesson_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "The $lesson lesson is already created ."]);
    exit;
}

// Vérifier la disponibilité du créneau horaire
$check_query = "SELECT * FROM timetable WHERE semester='$semester' AND time='$time' AND day='$day' AND room='$room'";
$check_query_run = mysqli_query($con, $check_query);

if (mysqli_num_rows($check_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "The class $room is occupied."]);
    exit;
}

// Vérifier la disponibilité du groupe
$check_groupTime_query = "SELECT * FROM timetable WHERE field='$field_name' AND time='$time' AND day='$day'  AND semester='$semester' AND group_name='$group'";
$check_groupTime_query_run = mysqli_query($con, $check_groupTime_query);

if (mysqli_num_rows($check_groupTime_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "you cannot use same group or or same teacher or any td/tp lesson with cours lesson in same time"]);
    exit;
}

$check_Cours_query = "SELECT * FROM timetable WHERE field='$field_name' AND time='$time' AND day='$day'  AND semester='$semester' AND group_name=''";
$check_Cours_query_run = mysqli_query($con, $check_Cours_query);
if (mysqli_num_rows($check_Cours_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "There is 'cours lesson' in this time you cannot add other lessons"]);
    exit;
}
// Vérifier la disponibilité du professeur
$check_teacher_query = "SELECT * FROM timetable WHERE  time='$time' AND day='$day'  AND semester='$semester' AND teacher_name='$teacher'";
$check_teacher_query_run = mysqli_query($con, $check_teacher_query);

if (mysqli_num_rows($check_teacher_query_run) > 0) {
    echo json_encode(['status' => 'error', 'message' => "Teacher cannot be used here"]);
    exit;
}

echo json_encode(['status' => 'success']);
