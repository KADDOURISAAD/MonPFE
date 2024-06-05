<?php
include('config/dbcon.php');
require_once('../tcpdf/tcpdf.php');

// Get distinct fields and semesters
$field_query = "SELECT DISTINCT Field FROM exams";
$field_query_run = mysqli_query($con, $field_query);

// Create a new PDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Exams Timetable');
$pdf->SetSubject('Exams Timetable PDF');
$pdf->SetKeywords('Timetable, PDF, Exams');

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

while ($field_row = mysqli_fetch_assoc($field_query_run)) {
    $field = $field_row['Field'];
    $semesters = ['S1', 'S2'];

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
                    <table border='1' cellpadding='5' cellspacing='0' style='width: 100%; border-collapse: collapse;'>
                    <thead>
                    <tr>
                    <th style='border: 1px solid #000000;'>Date</th>
                    <th style='border: 1px solid #000000;'>Time</th>
                    <th style='border: 1px solid #000000;'>Module</th>
                    <th style='border: 1px solid #000000;'>Room</th>
                    </tr>
                    </thead>
                    <tbody>";
            foreach ($exams as $index => $examrow) {
                $html .= "<tr>
                            <td style='border: 1px solid #000000;'>{$examrow['ExamDate']}</td>
                            <td style='border: 1px solid #000000;'>{$examrow['StartTime']}-{$examrow['EndTime']}</td>
                            <td style='border: 1px solid #000000;'>{$examrow['Module']}</td>";
                if ($index == 0) {
                    $html .= "<td rowspan='" . count($exams) . "' style='border: 1px solid #000000;'><b>{$examrow['Rooms']}</b></td>";
                }
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";

            // Output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
        }
    }
}

// Close and output PDF document
$pdf->Output('exam_timetable.pdf', 'D');
?>
