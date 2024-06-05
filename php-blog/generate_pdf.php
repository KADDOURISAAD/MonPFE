<?php
include('admin/config/dbcon.php');
require_once('tcpdf/tcpdf.php');
session_start();

if(isset($_SESSION['auth_user'])) { 
    $field = $_SESSION['auth_user']['user_field'];
    $role = $_SESSION['auth_role'];
    $user_name = $_SESSION['auth_user']['first_name'];
    $user_groupe = $_SESSION['auth_user']['user_groupe']; // Assuming 'user_groupe' is the group name of the user
    $semesters = ['S1', 'S2'];

    // Create a new PDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Timetable');
    $pdf->SetSubject('Timetable PDF');
    $pdf->SetKeywords('Timetable, PDF, Example');

    // Add an image to the header
    $image_file = 'assets/img/fse-logo.png';
    $pdf->Image($image_file, 10, 10, 30);

    // Set header data
    $pdf->SetHeaderData('', 0, 'Computer Science Department SBA', '');

    // Set header and footer fonts
    $pdf->setHeaderFont(Array('helvetica', '', 10));
    $pdf->setFooterFont(Array('helvetica', '', 10));

    // Set margins
    $pdf->SetMargins(15, 25, 15);
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(true, 10);

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    foreach ($semesters as $semester) {
        // Fetch timetable data from the database
        if ($role == '2') {
            $query = "SELECT time, day, lesson, group_name, teacher_name, room FROM timetable WHERE teacher_name = '$user_name' AND semester = '$semester'";
        } else {
            $query = "SELECT time, day, lesson, group_name, teacher_name, room FROM timetable WHERE field = '$field' AND semester = '$semester'";
        }
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0) {
            $pdf->AddPage();

            $html = '<h1>Timetable ';
            if ($role == '2') {
                $html .= $user_name;
            } else {
                $html .= $field;
            }
            $html .= ' - ' . $semester . '</h1>
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
                $highlight = ($row['group_name'] === $user_groupe) ? ' style="border: 2px red solid;"' : '';
                if(!empty($row['group_name'])){
                    $timetable[$key][] = '<span' . $highlight . '>' . $row['lesson'] . ' | ' . $row['group_name'] . ' | ' . $row['teacher_name'] . ' | ' . $row['room'] . '</span>';
                } else {
                    $timetable[$key][] = '<span' . $highlight . '>' . $row['lesson'] . ' | ' . $row['teacher_name'] . ' | ' . $row['room'] . '</span>';
                }
            }

            $times = ['8:30-10:00', '10:00-11:30', '11:30-13:00', '13:00-14:00', '14:00-15:30', '15:30-17:00'];

            foreach ($times as $time) {
                $html .= '<tr>';
                $html .= "<td>$time</td>";
                foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day) {
                    $html .= "<td>";
                    $key = $time . '-' . $day;
                    if (isset($timetable[$key])) {
                        $html .= implode('<br>', array_slice($timetable[$key], 0, 3));
                    }
                    $html .= "</td>";
                }
                $html .= '</tr>';
            }

            $html .= '</tbody>
            </table>';

            $pdf->writeHTML($html, true, false, true, false, '');
        }
    }

    $pdf->Output('timetable.pdf', 'D');
}
?>
