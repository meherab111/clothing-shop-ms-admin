<?php
session_start();


if (!isset($_SESSION['x'])) {
	header("Location: ../views/log_html.php");
}
require "../model/db.php";


$email = $_SESSION['email'];


$select_query = "SELECT * FROM registered WHERE email = ?";

$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $select_query)) {
	mysqli_stmt_bind_param($stmt, 's', $email);

	mysqli_stmt_execute($stmt);

	$select_result = mysqli_stmt_get_result($stmt);


	$email_count = mysqli_num_rows($select_result);

	if ($email_count > 0) {
		$fetch = mysqli_fetch_array($select_result);

}
}

	


 else {
	echo "*SQL Statement Failed";
}
	
?>

