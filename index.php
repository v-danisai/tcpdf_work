<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>PDF Buttons Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body class="bg-light">
		<header class="bg-dark text-white py-3 mb-4">
			<div class="container d-flex align-items-center w-25">
			<img src="images/create_icon.png" alt="Logo" class="w-25 me-3 rounded">
			<div>
				<h1 class="h3 mb-0 text-warning">TCPDF Technology</h1>
				<small>By Daniel V. & Keily C. </small>
			</div>
			</div>
		</header>

		<!-- Main Content -->
		<main class="container text-center">
			<h1 class="mb-3">Creating PDF Files for Two Scenarios</h1>
			<h5 class="mb-4 text-muted fw-bold">Demonstration || Student Grade || Payroll System</h5>

			<!-- Buttons -->
			<div class="d-flex justify-content-center gap-3">
				<a href="pdf_create/pdf_demo.php" target="_blank" class="btn btn-primary btn-lg">demo.pdf</a>
				<a href="pdf_create/pdf_student_grade.php" target="_blank" class="btn btn-success btn-lg">student_grade.pdf</a>
				<a href="pdf_create/pdf_payroll_system.php" target="_blank" class="btn btn-success btn-lg">payroll_sys.pdf</a>
			</div>

			<!-- Placeholder for image -->
			<div class="text-center mt-2">
				<img src="images/pdf_icon.png" alt="PDF Icon" class="w-25 img-fluid rounded shadow mt-5">
			</div>
		</main>
	</body>
</html>
