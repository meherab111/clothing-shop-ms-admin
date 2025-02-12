

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Password Reset</title>
</head>
<body>
<?php include 'header.php';
 
 require "../controller/password_reset_control.php";
 $_SESSION['db']=true;

 ?>

 
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate
		 onsubmit="return IsValidPassRes(this);">
    
		<center>
        
                <fieldset class = "pass-res-fieldset">
                  
                   <img class="forgot-pass" src="forgot-password.png" alt="Forgot-pass"> 
					
                   <br>
                        <table>
     
                                <tr class = "pass-res-tr">
                                

                                    <td class = "pass-res-td">
									<input class = "pass-res-input" type="email" placeholder="Enter Email Address"id="email" name="email" placeholder = "Enter Email" value = "<?php echo  $email;?>">
									<br>

									<span id="email_err_pass_res"></span>

									<span class=err>
									<?php echo $emailErr;?>
								</span>
                                </td>
                            </tr>
	
                        </table>
					
				
					<input class="pass-res-button" type="submit" name="send_reset_link" value="Send Reset Link">
					
					<br><br>
						<p>Don't have any account? <a href ="reg_html.php" class="pass-res-to-reg"> Register Here</a> </p>
						<br>
				<br>
				
						<br>	
                </fieldset>
				
           
		</center>
				<br><br><br>
				<a href ="log_html.php" class="pass-res-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>
		<br><br><br>
	</form>
 			
              


<?php include 'footer.php';?>
<script src="javascript/js_validate_pass_res.js"></script>			
</body>
</html>
