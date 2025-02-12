<?php
require "../model/db.php";
	
		if(isset($_POST['approve']))
		{
			$status_app = "Approved";

			$id = $_POST['id'];

			$update_query_app = "UPDATE emp_app_req SET status = ? WHERE id = ?";

			$stmt = mysqli_stmt_init($conn);

			if(mysqli_stmt_prepare($stmt,$update_query_app))
			{
				mysqli_stmt_bind_param($stmt, 'si', $status_app, $id);

				mysqli_stmt_execute($stmt);

				mysqli_stmt_get_result($stmt);
				header('Location: ../views/emp_request.php');

			}

			else
			{
				echo "*SQL Statement Failed";
			}


		}
		


		if(isset($_POST['reject']))
		{

			
			$id = $_POST['id'];

			$delete_query_rej = "DELETE FROM emp_app_req WHERE id = ? ";

			$stmt = mysqli_stmt_init($conn);

			if(mysqli_stmt_prepare($stmt, $delete_query_rej))
			{
				mysqli_stmt_bind_param($stmt, 'i', $id);

				mysqli_stmt_execute($stmt);

				mysqli_stmt_get_result($stmt);

				header('Location: ../views/emp_request.php');
			}

			else
			{
				echo "*SQL Statement Failed";
			}

			
		
			
		}



?>