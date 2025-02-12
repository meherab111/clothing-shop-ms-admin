
<?php
session_start();
ob_start();

if (!isset($_SESSION['x'])) {
	header("Location: ../views/log_html.php");
}

?>


<?php
require "../model/db.php";
		
		
		

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