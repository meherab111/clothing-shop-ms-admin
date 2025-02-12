<?php
session_start();


if (!isset($_SESSION['x'])) {
	header("Location: log_html.php");
}



$email = $_SESSION['email'];

include "db.php";

$select_query = "SELECT * FROM registered WHERE email = ?";

$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $select_query)) {
	mysqli_stmt_bind_param($stmt, 's', $email);

	mysqli_stmt_execute($stmt);

	$select_result = mysqli_stmt_get_result($stmt);


	$email_count = mysqli_num_rows($select_result);

	if ($email_count > 0) {
		$fetch = mysqli_fetch_array($select_result);

?>


		<!DOCTYPE html>

		<html>

		<head>
			<title>Dashboard</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="CSS/style.css">


		</head>

		<body>
			<?php include 'header.php'; ?>

			<h2 class="dashboard-header">Welcome To The Admin Dashboard</h2>


<div class="dashboard-time">
     <h4 >Current Date and Time: <span id="datetime"></span></h4>
</div>


			<!-- --------------------------------------------------------------------------------------------------- -->


		


			<div class="dashboard-div">

				<div class="img-container">

					<a href="display.php">

						<img src=" <?php echo "img/" . $fetch['image']; ?> " width="150" heigth="150" alt="Please Upload a Profile Picture.">
						
						<p><?php echo $fetch['name'] ?></p>
					</a>
				</div>





				<!--                 contents                      -->

				<div class="contents">
					<ul class="content-ul">

						<li> <a href="product.php" class="dashboard-ancor-1">
								<strong>• Product Details</strong>
							</a>
						</li>

						<li> <a href="employee.php" class="dashboard-ancor-2">
								<strong>• Employee Salary</strong>
							</a></li>

						<li> <a href="send_report.php" class="dashboard-ancor-3">
								<strong>• Send Report</strong>
							</a>
						</li>

						<li> <a href="emp_request.php" class="dashboard-ancor-4">
								<strong>• Employee Request's</strong>
							</a>
						</li>
					


					</ul>



				</div>

			</div>

			<br><br>

			<a href="logout.php" class="dashboard-button"> <img class="img-logout" src="output.png" alt="Logout Button">
			</a>
			<br><br><br>

	<?php

	}
} else {
	echo "*SQL Statement Failed";
}
	?>
	

	<?php include 'footer.php'; ?>

	<script src="javascript/js_dashboard.js"></script>
		</body>

		</html>