<?php

require '../vendor/autoload.php'; // Library Catalog

$pdf = new TCPDF(); // New PDF Object
$pdf->AddPage(); // Adds Blank Page
$pdf->SetFont('times', 'B', 26); // Times New Roman, Bold, Fnt Size
$pdf->Cell(0, 10, 'STUDENT REPORT CARD', 0, 1, 'C'); // Extends To The Page Width, Height Of The Cell, Text, Border, Move To The Next Line, Center Alignment

$pdf->Ln(8); // Small Line Space After Title

// Table Header
$cellWidth = 95; // Each Cell Width
$cellHeight = 14;

// Row #1
$pdf->SetFont('times', '', 14);
$pdf->Cell($cellWidth, $cellHeight, '   NAME: Kayti Lea', 1, 0); // Boarder, Same Line
$pdf->Cell($cellWidth, $cellHeight, '   SCHOOL YEAR: 2025', 1, 1); // Move To Next Line

// Row #2
$pdf->Cell($cellWidth, $cellHeight, '   INSTITUTION: 6th Form', 1, 0);
$pdf->Cell($cellWidth, $cellHeight, '   SEMESTER: 1st Semester', 1, 1);

// Row #3
$pdf->Cell($cellWidth, $cellHeight, '   TEACHER: Mr. Javier', 1, 0);
$pdf->Cell($cellWidth, $cellHeight, '   DATE: 16/09/2025', 1, 1);

$pdf->Ln(5);

$pdf->SetFont('times', 'B', 25);
$pdf->Cell(0, 10, 'Subject & Letter Grade', 0, 1, 'C');

$pdf->Ln(5);

$pdf->SetFont('times', 'B', 14);
$subjectCellWidth = 95; // Width Of Cell
$subjectCellHeight = 14; // Height Of Cell

// Stores Subjects And Grades
$subjects = [
    'Algebra' => 'A', 'English' => 'B+', 'Science' => 'A-', 'History' => 'B', 'Biology' => 'A+', 'Chemistry' => 'A', 'Physics' => 'A', 'Geography' => 'A+', 'Social Science' => 'A',];
    
    // Loops Through Each Subject Grade Pair
    foreach($subjects as $subject => $grade){
    $pdf->Cell($subjectCellWidth, $subjectCellHeight, '    '.$subject, 1, 0); // Left Cell, Subject Name, Adds Boarder, Stayes On The Same Line
    $pdf->Cell($subjectCellWidth, $subjectCellHeight, '    '.$grade, 1, 1); // Right Cell, Letter Grade, Adds Boarder, Moves To The Next Line
}

$pdf->Ln(4);

$pdf->SetFont('times', 'BI', 16); // Italic Fonts For Remarks
$pdf->Cell(0, 8, 'Remarks: Our Student Kayti Lea has an EXCELLENT performance!', 0, 1, 'C'); // Full Page Width, Hight Of Cell, Remark Message, No Boarder, Move To Next Line, Center Align

$pdf->Ln(6);
$pdf->Image('https://www.pngkit.com/png/full/330-3301556_official-logo-centro-escolar-mexico-junior-college-logo.png', 85, $pdf->GetY(), 40); // X = 85, Makes The Image Align With Current Cursor Position, Resizes Width To 40 Units

$pdf->Output('student_grade.pdf', 'I'); // The Name Of The File, "Inline" Displays PDF In The Browser

?>