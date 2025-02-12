


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
	<?php require "../controller/emp_request_control.php"; ?>
	
	</tbody>
	

</table>
</div>
<br><br><br>

<?php require "../controller/emp_request_app_rej_control.php"; ?>

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
	<?php require "../controller/emp_request2_control.php"; ?>
	
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



