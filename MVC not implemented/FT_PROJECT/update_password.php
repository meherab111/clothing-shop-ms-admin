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
	<script src="javascript/js_update_pass.js"></script>
	<title>Update Password</title>
</head>
<body>
 <?php include 'header.php';?>

<h2 class="up-pass-header">Update Password</h2>


 


<form action = "" method="POST"  novalidate >
    
        <center>

		<br>


                <fieldset class = "update-pass-fieldset">

                    
		<img class="update-pass" src="update-password.png" alt="Update-pass"> 	
                    
                        <table>
						
							<tr class="update-pass-tr">
								
								<td class="update-pass-td">
								  <input class="update-pass-input" type="password" placeholder="&nbsp;&nbsp;Old Password"id="oldpassword" name="oldpassword" >
								  <br>

								  <span id="oldpassword_err_update_pass"></span>

								
								  
							</td>
							</tr>
        
							<tr class="update-pass-tr">
								
								<td class="update-pass-td">
								  <input class="update-pass-input" type="password" placeholder="&nbsp;&nbsp;New Password"id="newpassword" name="newpassword" >
								  <br>

								  <span id="newpassword_err_update_pass"></span>

					
								  
							</td>
							</tr>
							<tr class="update-pass-tr">
								
								<td class="update-pass-td">
								  <input class="update-pass-input" type="password" placeholder="&nbsp;&nbsp;Confirm Password" id="conpassword" name="conpassword" >
								  <br>

								  <span id="confirmpassword_err_update_pass"></span>

						
								 
							</td>
							</tr>


                        </table>
						
						<br>
						<input class="update-pass-button" type="button" name="update_password" value="Update Password"
						 onclick="update_pass();">

						 <span id="h5"></span>
                </fieldset>
				
        </center> 
		<br>
			
			
            </form>

            
			
    	<br><br><br>
		<a href ="display.php" class="update-pass-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>
		<br><br><br>      


<?php include 'footer.php';?>	
	
</body>
</html>

