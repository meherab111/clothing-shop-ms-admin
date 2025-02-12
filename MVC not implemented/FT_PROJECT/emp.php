<?php
session_start();

$employee_name = $daily_salary = $total_days_in_month  = $absent_days_allowed =  $absent_days = "";


//Name 
if (isset($_POST['submit'])) 
{

	
		$employee_name = $_POST['employee_name'];
		$daily_salary = $_POST['daily_salary'];
		$total_days_in_month = $_POST['total_days_in_month'];
		$absent_days_allowed = $_POST['absent_days_allowed'];
		$absent_days = $_POST['absent_days'];
		

	include "db.php";

		$insert_query = "insert into emp_info (employee_name,daily_salary,total_days_in_month,absent_days_allowed,absent_days)
				values ('$employee_name', '$daily_salary', '$total_days_in_month', '$absent_days_allowed','$absent_days')";
			
				$checkInsertQuery = mysqli_query($conn,$insert_query);
				
				if($checkInsertQuery)
				{
					echo "";
				} 
				
				
				
	?>
	
		<html>
		
		<body>
		
		<table>
			
			
			<thead>
				<tr>
					<th>|Employee ID|</th>
					<th>|Employee name|</th>
					<th>Daily salary|</th>
					<th>Total days in month|</th>
					<th>Absent days allowed|</th>
					<th>Absent days|</th>

				</tr>
					
			</thead>
			
			<br><br>
			<tbody>
			
	<?php	 
 
	$sql = "SELECT * FROM emp_info";
	
	$checkQuery_emp = mysqli_query($conn,$sql);
	
	
	$row_count = mysqli_num_rows($checkQuery_emp);
	

	if ($row_count > 0) 

	{
		$total_wage = 0;
		echo "<u>Calculated Total Salary & Wage</u>: ";
		echo "<br>";
		
		while($fetch_emp = mysqli_fetch_array($checkQuery_emp))
			{
				
		?>		
							<tr>
							<td><center><?php echo $fetch_emp['id'];?></center></td>
							<td><center><?php echo $fetch_emp['employee_name'];?></center></td>
							<td><center><?php echo $fetch_emp['daily_salary'];?></center></td>
							<td><center><?php echo $fetch_emp['total_days_in_month'];?></center></td>
							<td><center><?php echo $fetch_emp['absent_days_allowed'];?></center></td>
							<td><center><?php echo $fetch_emp['absent_days'];?></center></td>
						
							
							</tr>
							

						<?php		
							$employee_name = $fetch_emp['employee_name'];
							$daily_salary = $fetch_emp['daily_salary'];
							$total_days_in_month = $fetch_emp['total_days_in_month'];
							$absent_days_allowed = $fetch_emp['absent_days_allowed'];
							$absent_days = $fetch_emp['absent_days'];
							
							
						// Calculate the salary for the month
						if ($absent_days <= $absent_days_allowed)
							{
						  
							$total_salary = ($daily_salary * $total_days_in_month);
							} 
						else 
							{
							// Deduct $1,000 per day for each additional absent day beyond the limit
							$deduction = (($absent_days - $absent_days_allowed) * $daily_salary);
							$total_salary = (($daily_salary * $total_days_in_month) - $deduction);
							}
							
							echo "Total Salary for <strong>'$employee_name'</strong> is = <strong>$total_salary</strong>";
							echo "<br>";
							
								$total_wage = ($total_wage + $total_salary);
								
			}
			echo "<br>";
				echo "Total Employee Wage = <strong>$total_wage</strong><br>";
		 echo "<br>";	
		echo "<u>Employee Details Regarding Salary</u>: ";
	   echo "<br>";
    
	
    
			
			
		
			
	} 
		

}
?>
		</tbody>
	

	</table>


	<br> <br>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate>
    
        
                <fieldset style = "width:25%;">
                    <legend><strong>Employe Data</strong></legend>
					
                    
                        <table>
                      
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Employee name "?> </td>
                                    <td>
                                : <input type="text" id="employee_name" name="employee_name" value = "<?php echo  $employee_name;?>">
								<br>
								
                                </td>
                            </tr>
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "daily_salary "?> </td>
                                    <td>
                                : <input type="text" id="daily_salary" name="daily_salary" value = "<?php echo  $daily_salary;?>">
								<br>
								
                                </td>
                            </tr>
							
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "total_days_in_month"?> </td>
                                    <td>
                                : <input type="text" id="total_days_in_month" name="total_days_in_month" value = "<?php echo  $total_days_in_month;?>">
								<br>
								
                                </td>
                            </tr>
							
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "absent_days_allowed "?> </td>
                                    <td>
                                : <input type="text" id="absent_days_allowed" name="absent_days_allowed" value = "<?php echo  $absent_days_allowed;?>">
								<br>
								
                                </td>
                            </tr>
								
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "absent_days "?> </td>
                                    <td>
                                : <input type="text" id="absent_days" name="absent_days" value = "<?php echo  $absent_days;?>">
								<br>
								
                                </td>
                            </tr>

							
                          
							
						</table>
							  <input type="submit" name="submit" value="submit">
				</fieldset>
		</form>
		</body>
</html>

