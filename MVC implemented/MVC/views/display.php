
<?php
session_start();
ob_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}	
	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Display</title>
</head>
<body>
 <?php include 'header.php';
	
	require "../model/db.php";
	?>

<h2 class ="display-header">Profile View & Update</h2>
<div class="emp-div">
<table>

	<thead>
		<tr>
			<th class="display-th"> Id     </th>
			<th class="display-th"> Name   </th>
			<th class="display-th"> Phone  </th>
			<th class="display-th"> Email  </th>
			<th class="display-th"> Status </th>
		</tr>	
	</thead>
	
	<tbody>
	<?php
	
	
		$email = $_SESSION['email'];
		
		

		$select_query = "SELECT * FROM registered WHERE email = ?";

		$stmt = mysqli_stmt_init($conn);

		if(mysqli_stmt_prepare($stmt, $select_query))
		{
			mysqli_stmt_bind_param($stmt, 's', $email);

			mysqli_stmt_execute($stmt);

			$select_result = mysqli_stmt_get_result($stmt);


		}
		else
		{
			echo "*SQL Statement Failed";
		}
	
		
		$email_count = mysqli_num_rows($select_result);

		if($email_count > 0)
		{
			$fetch = mysqli_fetch_array($select_result);
		



	?>
		<tr>
			
			<td class="display-td" ><?php echo $fetch['id'];?> &nbsp &nbsp </td>
			<td class="display-td" ><?php echo $fetch['name'];?> &nbsp &nbsp </td>
			<td class="display-td" ><?php echo $fetch['phone'];?> &nbsp &nbsp </td>
			<td class="display-td" ><?php echo $fetch['email'];?> &nbsp &nbsp </td>
			<td class="display-td" ><?php echo $fetch['status'];?> &nbsp &nbsp </td>

		</tr>
	<?php		
			
		}
  


	?>
	
	</tbody>
	

</table>
</div>

<!-- _____________________________________PROFILE UPDATE_______________________ -->		

	<?php require "../controller/profile_control.php"; ?>


							<?php
					if(isset($_SESSION['img']) && $_SESSION != '')
					{
						echo $_SESSION['img'];
						
						unset($_SESSION['img']);
					}
					?>


<div class="emp-div-dis">
	
		 <form method="post" action="" onsubmit="return IsValidDisplay(this);" novalidate>
			
                <fieldset class="pro-update-fieldset">
				<center>
                    
                <table>
					
					<?php	
						
						$id = $fetch['id'];
						
						$show_query = "SELECT * FROM registered WHERE id = ?";

						  $stmt = mysqli_stmt_init($conn);

                
                    if(mysqli_stmt_prepare($stmt,$show_query))
                        {
                            mysqli_stmt_bind_param($stmt,'i', $id);
                          
                            mysqli_stmt_execute($stmt);

                            $show_result = mysqli_stmt_get_result($stmt);

                            $arr_data = mysqli_fetch_assoc($show_result);

                            
                        }
                        else
                        {
                            
                            echo "SQL statement failed";
                        }

						
					?>
                    
                       	<img class="update-user" src="update-user.png" alt="Update-Profile">
                      
                            <tr class="pro-update-tr">

                                    <td class="pro-update-td">
                                <input class="pro-update-input" type="text" id="name" name="name" placeholder="Full Name" value = "<?php echo $arr_data['name'];?>">
								<br>

								<span id="fullname_err_display"></span>

								<span class=err>
								<?php echo $nameErr;?>
							</span>
                                </td>
                            </tr>

                           <tr class="pro-update-tr">
                                
                                  <td class="pro-update-td">  
								  <input class="pro-update-input" type="tel" id="phone" name="phone" maxlength="11" placeholder ="Phone Number"value = "<?php echo $arr_data['phone'];?>" >
								  <br>

								  <span id="phone_err_display"></span>

								  <span class=err>
								  <?php echo $phoneErr;?>
								</span>
                                </td>
                            </tr>

            
				<tr class="pro-update-tr">
					<td class="pro-update-td">  
				<strong><p>UPDATE PASSWORD?</strong><a class="update-pass" href="update_password.php"> Click Here</a></p>
				<br>
				<br>
				</td>
				</tr>

				<tr class="pro-update-tr">
					<td class="pro-update-td"> 
				<input class = "pro-up-button" type="submit" name="update" value="Update">	
					</td>
			</tr>
		</table>
		<center>
                </fieldset>
	
		</form>
	

	
			
		<form action="../views/img.php" method="post" enctype="multipart/form-data">

				<fieldset class="img-update-fieldset">
				<center>
				<table>
				
			<img class="update-img" src="update-img.png" alt="Update-Image">

			<tr class="pro-update-tr-pic">
				<td class="pro-update-td">

				<img src=" <?php echo "img/". $fetch['image']; ?> " width="150" heigth="150" alt = "Please Upload a Profile Picture.">

				<br>
				</td>
			</tr>

			<tr class="pro-update-tr-pic">
				<td class="pro-update-td">
                <input type="file" id="image" name="image">
				<br><br>
				</td>
			</tr>

			<tr class="pro-update-tr-pic">
				<td class="pro-update-td">
				<input class="img-button" type="submit" name="upload" value = "Update Image">
				<br>
				</td>
			</tr>

			

			</table>
			</center>
				
				</fieldset>

		
				
		</form>			
				
				

 </div>        
			
            <br><br><br>
		
	

		<a href ="../views/dashboard.php" class="display-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>
		<br><br><br>

		
<?php include 'footer.php';?>
<script src="javascript/js_validate_display.js"></script>	
</body>
</html>


