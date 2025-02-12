

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Change Password</title>
</head>
<body>
<?php include 'header.php';

require "../controller/change_password_control.php";

?>


  <center>

 <form action = "" method="post"  onsubmit="return IsValidChngPass(this);" novalidate >
    
       
			 <p> <?php 
		 
		 if(isset($_SESSION['msg']))
		 {		 
			 echo $_SESSION['msg'];
		 }
		 else
		 {
			 echo $_SESSION['msg'] = "";
			 
		 }

		 ?> </p> 
		<br>
                <fieldset class="cng-pass-fieldset">
              
               <img class="change-pass" src="change-password.png" alt="Change-pass"> 
					
                    
                        <table>
        
							<tr class="cng-pass-tr">
								
								<td class="cng-pass-td">
								  <input class="cng-pass-input" type="password" placeholder="New Password"id="password" name="password" value = "<?php echo  $newpassword;?>">
								  <br>

								  <span id="password_err_chng_pass"></span>

								  <span class=err>
								  <?php echo $newpasswordErr;?>
								</span>
								  
							</td>
							</tr>
							<tr class="cng-pass-tr">
								
								<td class="cng-pass-td">
								  <input class="cng-pass-input" type="password" placeholder="Confirm Password" id="conpassword" name="conpassword" value = "<?php echo  $conpassword;?>">
								  <br>

								  <span id="confirmpassword_err_chng_pass"></span>

								  <span class=err>
								  <?php echo $conpasswordErr;?>
								</span>
								 
							</td>
							</tr>


                        </table>
						
						<br>
						<input class="cng-pass-button" type="submit" name="update_password" value="Update Password">
						
						<br><br>
						<p>Already have an account? <a href ="log_html.php" class="cng-pass-to-log">Login Here</a> </p>
						
						
						<br>
			
	 
                </fieldset>
				
           <br><br>
			
			
            </form>
			
        </center>        


<?php include 'footer.php';?>	
<script src="javascript/js_validate_chng_pass.js"></script>			
</body>
</html>


