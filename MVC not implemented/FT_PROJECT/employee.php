<?php
session_start();

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
	<title>Employee</title>
	</head>
	<body>
	<?php include 'header.php';?>	
			
	<h2 class ="employee-header">Employee Salary</h2>	

	<div class="emp-div">
		<table>
			
			
<!-- 			<thead >
				<tr >
				
					<th class="employee-th"> Employee ID  		  </th>
					<th class="employee-th"> Employee name       </th>
					<th class="employee-th"> Daily salary	  	  </th>
					<th class="employee-th"> Total days in month </th>
					<th class="employee-th"> Absent days allowed </th>
					<th class="employee-th"> Absent days		  </th>

				</tr>
					
			</thead>
 -->
			
			<br><br>
			<tbody>
			<tr>
				<td>
				<p id="data-emp"></p>
			</td>
			</tr>
			
<?php	

	include "db.php";
 
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

		</tbody>
	

	</table>
</div>
		<br><br><br>
		<a href ="dashboard.php" class="employee-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>   
		<br><br><br>


<?php include 'footer.php';?>
<script src="javascript/js_employee.js"></script>		
</body>
</html>












