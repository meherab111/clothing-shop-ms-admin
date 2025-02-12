
<?php
session_start();
ob_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: log_html.php");
}

?>


<!DOCTYPE html>
<html>

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Employee Request</title>
	</head>

	<body>
	 <?php include 'header.php';?>


		<h2 class ="emp-req-header">Employee Request's</h2>	
	
<div class="emp-div-1">
<table>
	<div class="emp-req-li">
<strong><u>Requested Employee List: </u></strong>
</div>
	<thead>
		<tr>
			<th class="emp-req-th"> Id     </th>
			<th class="emp-req-th"> Name   </th>
			<th class="emp-req-th"> Email  </th>
			<th class="emp-req-th"> Action </th>
		</tr>	
	</thead>
	
	<tbody>
	<?php
	
	
		
		
		include "db.php";

		$status = "Pending";

		$select_query = "SELECT * FROM emp_app_req WHERE status= ? 
		ORDER BY id ASC";

		$stmt = mysqli_stmt_init($conn);

		if(mysqli_stmt_prepare($stmt, $select_query))

		{
			mysqli_stmt_bind_param($stmt, 's', $status);

			mysqli_stmt_execute($stmt);

			$select_result = mysqli_stmt_get_result($stmt);

					$email_count = mysqli_num_rows($select_result);

					if($email_count > 0)
					{
						
					while($fetch = mysqli_fetch_array($select_result))
						{



				?>
					<tr>
						
						
						<td class="emp-request-td"><?php echo $fetch['id'];?> &nbsp &nbsp </td>
						<td class="emp-request-td"><?php echo $fetch['name'];?> &nbsp &nbsp </td>
						<td class="emp-request-td"><?php echo $fetch['email'];?> &nbsp &nbsp </td>
						<td class="emp-request-td">

							<form action="emp_request.php" method="post">

							<input type="hidden" id="id" name="id" value = "<?php echo $fetch['id']; ?> ">
							<input class="emp-req-acpt-button" type="submit" id="approve" name="approve" value = "Approve"> &nbsp &nbsp <br>
							<input class="emp-req-rejct-button" type="submit" id="reject" name="reject" value = "Reject"> &nbsp &nbsp <br>

							</form>

						</td>
						
					</tr>
						
				<?php		
						
						}

					}

		}
	
		else
		{
			echo "*SQL Statement Failed";
		}


	?>
	
	</tbody>
	

</table>
</div>
<br><br><br>

<?php
	
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
				header('Location:emp_request.php');

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

				header('Location:emp_request.php');
			}

			else
			{
				echo "*SQL Statement Failed";
			}

			
		
			
		}



?>
<div class="emp-div-2">
	<div class="emp-li">
<strong><u>Employee List: </u></strong>
</div>
<table>

	<thead>
		<tr>
		
			<th class="emp-req-list-th"> Id     </th>
			<th class="emp-req-list-th"> Name   </th>
			<th class="emp-req-list-th"> Email  </th>
			<th class="emp-req-list-th"> Status </th>
			
		</tr>	
	</thead>
	
	<tbody>
	<?php
	
	
		
		
		include "db.php";

		$select_query = "SELECT * FROM emp_app_req";

		$stmt = mysqli_stmt_init($conn);

		if(mysqli_stmt_prepare($stmt, $select_query ))
		{

			mysqli_stmt_execute($stmt);

			$select_result_emp = mysqli_stmt_get_result($stmt);


					$email_count = mysqli_num_rows($select_result_emp);

					if($email_count > 0)
					{
						
					while($fetch = mysqli_fetch_array($select_result_emp))
						{

				?>
					<tr>
						
						<td class="emp-list-td"><?php echo $fetch['id'];?> &nbsp &nbsp </td>
						<td class="emp-list-td"><?php echo $fetch['name'];?> &nbsp &nbsp </td>
						<td class="emp-list-td"><?php echo $fetch['email'];?> &nbsp &nbsp </td>
						<td class="emp-list-td"><?php echo $fetch['status'];?> &nbsp &nbsp </td>

					</tr>
						
				<?php		
						}
					}

		}
	
		else
		{
			echo "*SQL Statement Failed";
		}



	?>
	
	</tbody>
	

</table>
</div>


		<br><br><br>

		<a href ="dashboard.php" class="employee-req-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>
		<br><br><br>


<?php include 'footer.php';?>
</body>
</html>



