<?php
session_start();


if (isset($_SESSION['y']) && $_SESSION['y']) 
{

	require "../model/db.php";

	if(isset($_GET['token']))
	{
		$token = $_GET['token'];
		
		$update_query = " UPDATE registered SET status='active' WHERE token='$token'";
		
		$query = mysqli_query($conn, $update_query);
		
		if($query)
		{
			if(isset($_SESSION['notify']))
			{
				$_SESSION['notify'] = "Account Verified Successfully.";
				header('Location: ../controller/log_html_control.php');
				
			}
			else
			{
				
				$_SESSION['notify'] = "You are Logged out.";
				header('Location: ../controller/log_html_control.php');
			}
		}
		else
		{
				$_SESSION['notify'] = "Account Not Verified.";
				header('Location: ../controller/reg_html_control.php');
		}
		
	}

} 

else 
{
	header("Location: ../views/reg_html.php");
}


?>