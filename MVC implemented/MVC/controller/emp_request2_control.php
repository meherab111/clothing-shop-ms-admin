<?php
	
	
		
		
		require "../model/db.php";

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