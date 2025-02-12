<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}
	?>

				
<?php	

require "../model/db.php";
 
	$select_sql = "SELECT * FROM emp_info";

	$stmt = mysqli_stmt_init($conn);

	if(mysqli_stmt_prepare($stmt, $select_sql))
	{

		mysqli_stmt_execute($stmt);

		$sql_result = mysqli_stmt_get_result($stmt);


		$row_count = mysqli_num_rows($sql_result);
					

					if ($row_count > 0) 

					{
						$total_wage = 0;


						echo "<strong><u>Calculated Total Salary & Wage: &nbsp;</u></strong>";

						while($fetch_emp = mysqli_fetch_array($sql_result))
							{
						?>		
<!-- 							<tr>
							<td class="employee-td"><?php //echo $fetch_emp['id'];?> &nbsp &nbsp </td>
							<td class="employee-td"><?php //echo $fetch_emp['employee_name'];?> &nbsp &nbsp </td>
							<td class="employee-td"><?php //echo $fetch_emp['daily_salary'];?> &nbsp &nbsp </td>
							<td class="employee-td"><?php //echo $fetch_emp['total_days_in_month'];?> &nbsp &nbsp </td>
							<td class="employee-td"><?php //echo $fetch_emp['absent_days_allowed'];?> &nbsp &nbsp </td>
							<td class="employee-td"><?php //echo $fetch_emp['absent_days'];?> &nbsp &nbsp </td>
						
							
							</tr> -->
									

								<?php
								
									$employee_name = $fetch_emp['employee_name'];
									$daily_salary = $fetch_emp['daily_salary'];
									$total_days_in_month = $fetch_emp['total_days_in_month'];
									$absent_days_allowed = $fetch_emp['absent_days_allowed'];
									$absent_days = $fetch_emp['absent_days'];
									
									
								
								if ($absent_days <= $absent_days_allowed)
									{
								  
									$total_salary = ($daily_salary * $total_days_in_month);
									} 
								else 
									{
									
									$deduction = (($absent_days - $absent_days_allowed) * $daily_salary);
									$total_salary = (($daily_salary * $total_days_in_month) - $deduction);
									
									}
									?>
									<div class="info">
									Total Salary for &nbsp;<strong><?php echo $employee_name;?></strong>&nbsp; is = &nbsp;<strong><?php echo $total_salary;?>/-</strong>
									<br>
								</div>
									<?php
											
										$total_wage = ($total_wage + $total_salary);
									
							}
							?>
							<div class="info-wage">
							<br>
							Total Employee Wage = &nbsp;<strong><?php echo $total_wage;?>/-</strong><br>
						 <br>
						 </div>
						 <div class="info-emp">
						<strong><u>Employee Details Regarding Salary: </u></strong>
					  <br>
					</div>
					   <?php
	
					} 

					?>

					<button class="emp_data" onclick="fetch_emp();">View Employee Details</button>



<?php
	}
	else
	{
		echo "*SQL Statement Failed";
	}
	



?>