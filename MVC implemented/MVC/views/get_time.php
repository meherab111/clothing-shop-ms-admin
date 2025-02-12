<?php
session_start();
if (!isset($_SESSION['x'])) {
	header("Location: ../views/log_html.php");
}

// get_datetime.php - This file only echoes the current date and time
date_default_timezone_set('Asia/Dhaka');

echo date("d-m-Y | g:i:s A");
?>
