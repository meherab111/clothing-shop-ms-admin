
 	
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
<?php require "../controller/employee_control.php"; ?>

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












