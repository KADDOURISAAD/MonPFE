<?php
include('admin/config/dbcon.php');
require_once('tcpdf/tcpdf.php');
session_start();

if(isset($_SESSION['auth_user'])) { 
    $field = $_SESSION['auth_user']['user_field'];
    $role = $_SESSION['auth_role'];
    $user_name = $_SESSION['auth_user']['first_name'];
    $semesters = ['S1', 'S2'];

    // Create a new PDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Name');
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Exams Timetable');
    $pdf->SetSubject('Exams Timetable PDF');
    $pdf->SetKeywords('Exams, Timetable, PDF');

    // Set header and footer data
    $pdf->SetHeaderData('assets/img/fse-logo.png', 30, 'Computer Science Department SBA', '');
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    // Set header and footer fonts
    $pdf->setHeaderFont(Array('helvetica', '', 10));
    $pdf->setFooterFont(Array('helvetica', '', 8));

    // Set margins
    $pdf->SetMargins(15, 25, 15);
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 10);

    // Set font
    $pdf->SetFont('helvetica', '', 10);

    foreach ($semesters as $semester) {
        $query = "SELECT id, Rooms, ExamDate, DATE_FORMAT(StartTime, '%H:%i') AS StartTime, DATE_FORMAT(EndTime, '%H:%i') AS EndTime, Module FROM exams WHERE Field = ? AND Semester = ? ORDER BY ExamDate";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss', $field, $semester);
        $stmt->execute();
        $result = $stmt->get_result();
        $exams = $result->fetch_all(MYSQLI_ASSOC);

        if (count($exams) > 0) {
            $pdf->AddPage();

            // HTML content
            $html = "<h1>$field-$semester Exams Timetable</h1>
                    <table border='1' cellpadding='5' cellspacing='0'>
                    <thead>
                    <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Module</th>
                    <th>Room</th>
                    </tr>
                    </thead>
                    <tbody>";
            foreach ($exams as $index => $examrow) {
                $html .= "<tr>
                            <td>{$examrow['ExamDate']}</td>
                            <td>{$examrow['StartTime']}-{$examrow['EndTime']}</td>
                            <td>{$examrow['Module']}</td>";
                if ($index == 0) {
                    $html .= "<td rowspan='" . count($exams) . "'>Rooms: <b>{$examrow['Rooms']}</b></td>";
                }
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";

            // Output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
        }
    }

    // Close and output PDF document
    $pdf->Output('exams_timetable.pdf', 'D');
}
?>
