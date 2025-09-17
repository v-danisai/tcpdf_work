<?php

	// Include the main TCPDF library (search for installation path).
	require_once('../vendor/autoload.php');
	include "../db_conn/db_connection.php";

	$sql = "SELECT employee_info.employee_id, employee_info.employee_name, employee_info.employee_pay, boss_info.boss_name FROM employee_info 
			INNER JOIN boss_info WHERE employee_info.payer = boss_info.boss_id";

	$query = mysqli_query($conn, $sql);
			
	while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;
    }

	// extend TCPF with custom functions
	class MYPDF extends TCPDF{

		// Colored table
		public function ColoredTable($header,$data) {
			// Colors, line width and bold font
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128, 0, 0);
			$this->SetLineWidth(0.3);
			$this->SetFont('', 'B');

			// Header
			$w = array(40, 35, 40, 45);
			$num_headers = count($header);
			for($i = 0; $i < $num_headers; ++$i) {
				$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
			}

			$this->Ln();
			// Color and font restoration
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');

			// Data
			$fill = 0;
			foreach($data as $key => $payroll_info){
				$this->Cell($w[0], 6, $payroll_info['employee_id'], 'LR', 0, 'L', $fill);
				$this->Cell($w[1], 6, $payroll_info['employee_name'], 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 6, $payroll_info['employee_pay'], 'LR', 0, 'R', $fill);
				$this->Cell($w[3], 6, $payroll_info['boss_name'], 'LR', 0, 'R', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w), 0, '', 'T');
		}
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Daniel Villanueva');
	$pdf->SetTitle('TCPDF');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, payroll_system');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('helvetica', '', 12);

	// add a page
	$pdf->AddPage();

	// column titles
	$header = array('ID', 'Employee Name', 'Employee Pay', 'Boss Name');

	// print colored table
	$pdf->ColoredTable($header, $data);

	// ---------------------------------------------------------

	// close and output PDF document
	$pdf->Output('payroll_system.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+