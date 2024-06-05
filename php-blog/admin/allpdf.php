<?php
include('config/dbcon.php');
require_once('../tcpdf/tcpdf.php');



    $semesters = ['S1', 'S2'];

    // Create a new PDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Timetable');
    $pdf->SetSubject('Timetable PDF');
    $pdf->SetKeywords('Timetable, PDF, Example');

    // Set header and footer
    $pdf->setPrintHeader(true);
    $image_file = 'assets/img/fse-logo.png';
    $pdf->Image($image_file, 10, 10, 30);
    $pdf->SetHeaderData('', 0, '', '');
    $pdf->setHeaderFont(Array('helvetica', '', 10));
    $pdf->SetMargins(15, 25, 15);
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('helvetica', '', 10);

    // Fetch all distinct fields
    $field_query = "SELECT DISTINCT field FROM timetable";
    $field_query_run = mysqli_query($con, $field_query);

    while ($field_row = mysqli_fetch_assoc($field_query_run)) {
        $field = $field_row['field'];

        foreach ($semesters as $semester) {
            $query = "SELECT time, day, lesson, group_name, teacher_name, room FROM timetable WHERE field = '$field' AND semester = '$semester'";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                $pdf->AddPage();
                $html = '<h1>Timetable ' . $field . '-' . $semester . '</h1>';
                $html .= generateTimetableHTML($query_run);
                $pdf->writeHTML($html, true, false, true, false, '');
            }
        }
    }

    // Close and output PDF document
    $pdf->Output('timetable.pdf', 'D');

function generateTimetableHTML($query_run) {
    $times = ['8:30-10:00', '10:00-11:30', '11:30-13:00', '13:00-14:00', '14:00-15:30', '15:30-17:00'];
    $html = '
    <table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
    <th scope="col">Time</th>
    <th scope="col">Sunday</th>
    <th scope="col">Monday</th>
    <th scope="col">Tuesday</th>
    <th scope="col">Wednesday</th>
    <th scope="col">Thursday</th>
    </tr>
    </thead>
    <tbody>';

    $timetable = [];
    foreach ($query_run as $row) {
        $key = $row['time'] . '-' . $row['day'];
        if (!isset($timetable[$key])) {
            $timetable[$key] = [];
        }
        if(!empty($row['group_name'])){
            $timetable[$key][] = $row['lesson'] . '|' . $row['group_name'] . '|' . $row['teacher_name'] . '|' . $row['room'];
            } else {
                $timetable[$key][] = $row['lesson'] . ' |' . $row['teacher_name'] . '|' . $row['room'];
            }
    }

    foreach ($times as $time) {
        $html .= '<tr>';
        $html .= "<td>$time</td>";
        foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day) {
            $html .= "<td>";
            $key = $time . '-' . $day;
            if (isset($timetable[$key])) {
                $html .= implode('<br>', array_slice($timetable[$key], 0, 3)); // Display up to three events
            }
            $html .= "</td>";
        }
        $html .= '</tr>';
    }

    $html .= '</tbody>
    </table>';

    return $html;
}
?>
