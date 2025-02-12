
<?php
session_start();
ob_start();



?>


<!DOCTYPE html>
<html>
<body>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Employee Request (App/Rjc)</title>
	</head>

<h2 class ="emp-req-dash-header">Employee Request's (Approve / Reject)</h2>	


<br>

<table>
<u><strong>Requested Employee List: </strong></u>
	<thead class="emp-request-dash-thead">
		<tr>
			<th> Id     </th>
			<th> Name   </th>
			<th> Email  </th>
			<th> Status </th>
			<th> Action </th>
		</tr>	
	</thead>
	
	<tbody>
	<?php
	
	
		
		
		include "db.php";

		$select_query = "SELECT * FROM emp_app_req WHERE status='Pending' ORDER BY id ASC";
	

		$query = mysqli_query($conn, $select_query);
		
		$email_count = mysqli_num_rows($query);

		if($email_count > 0)
		{
			
		while($fetch = mysqli_fetch_array($query))
			{



	?>
 		<tr>
			
			<td class="emp-request-dash-td"><?php echo $fetch['id'];?> &nbsp &nbsp </td>
			<td class="emp-request-dash-td"><?php echo $fetch['name'];?> &nbsp &nbsp </td>
			<td class="emp-request-dash-td"><?php echo $fetch['email'];?> &nbsp &nbsp </td>
			<td class="emp-request-dash-td"><?php echo $fetch['status'];?> &nbsp &nbsp </td>
			<td class="emp-request-dash-td">
			<center>

			<form action="emp_requ_dashboard.php" method="post">
			<input type="hidden" id="id" name="id" value = "<?php echo $fetch['id']; ?> ">
			<input class="emp-req-dash-acpt-button" type="submit" id="approve" name="approve" value = "Approve"> &nbsp &nbsp <br>
			
			<input class="emp-req-dash-rejct-button" type="submit" id="reject" name="reject" value = "Reject"> &nbsp &nbsp <br>
			
			
			</form>
			</center></td>
			
		</tr> 
			
	<?php		
			
			}

		}

	?>
	
	</tbody>
	

</table>
<br><br><br> 

<?php
	
		if(isset($_POST['approve']))
		{
			
			$id = $_POST['id'];
			$update_query_app = "UPDATE emp_app_req SET status = 'Approved' WHERE id ='$id'";
			$updated_app = mysqli_query($conn,$update_query_app);
			header('Location:emp_requ_dashboard.php');
			
		}
		if(isset($_POST['reject']))
		{
			
			$id = $_POST['id'];
			$update_query_rej = "DELETE FROM emp_app_req WHERE id ='$id'";
			$updated_rej = mysqli_query($conn,$update_query_rej);
			
			header('Location:emp_requ_dashboard.php');
			
		}


?>

 <u><strong>Approved Employee List: </strong></u>

<table>

	<thead>
		<tr>
		
			<th>| Id     |</th>
			<th>| Name   |</th>
			<th>| Email  |</th>
			<th>| Status |</th>
			
		</tr>	
	</thead>
	
	<tbody> 
	<?php
	
	
		
		
		include "db.php";

		$select_query = "SELECT * FROM emp_app_req";
	

		$query = mysqli_query($conn, $select_query);
		
		$email_count = mysqli_num_rows($query);

		if($email_count > 0)
		{
			
		while($fetch = mysqli_fetch_array($query))
			{



	?>
 		<tr>
			
			<td><center><?php echo $fetch['id'];?> &nbsp &nbsp </center></td>
			<td><center><?php echo $fetch['name'];?> &nbsp &nbsp </center></td>
			<td><center><?php echo $fetch['email'];?> &nbsp &nbsp </center></td>
			<td><center><?php echo $fetch['status'];?> &nbsp &nbsp </center></td>

		</tr>
			
	<?php		
			}
		}

	?>
	
	</tbody>
	

</table>


<br><br><br><br>
<a href ="dashboard.php">Go Back</a>

</body>
</html>
<center>
	
</center> 


