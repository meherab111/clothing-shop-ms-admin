<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Password Reset</title>
</head>
<body>
<?php include 'header.php';?>
  
<?php
$email = $emailErr = "";


//Name 
if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    $flag = false;

//Email
    if (empty($_POST["email"])) {
        $emailErr = "*Email is required";
        $flag = true;
    } else {
        $email = sanitize($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid Email format";
            $flag = true;
        }
    }

    if ($flag === false) 
	{
			
			
			$_SESSION['email'] = $email;

			include "db.php";

			
			$checkEmailQuery = "SELECT * FROM registered WHERE email = ?";

			$stmt = mysqli_stmt_init($conn);

			if(mysqli_stmt_prepare($stmt,$checkEmailQuery))
			{
				mysqli_stmt_bind_param($stmt, 's', $email);

				mysqli_stmt_execute($stmt);

				$checkEmailResult = mysqli_stmt_get_result($stmt);
		

					
					$email_count = mysqli_num_rows($checkEmailResult);

					if ($email_count) {

						$data = mysqli_fetch_array($checkEmailResult);
						
						$name = $data['name'];
						$token = $data['token'];
						
							// email authentication
							
							
							$subject = "Account Password Reset.";

							$body = "Hello, $name.\n";
							$body .= "Please click this link to Reset your Acccount Password - \n";
							$body .=
							"http://localhost/FINAL/FT_PROJECT/change_password.php?token=$token \n\n";

							$sender = "From: clothingshop618@gmail.com";

							if (mail($email, $subject, $body, $sender)) 
							{
								
								$_SESSION['notify'] = "Check your Email- <strong>$email</strong>, to Reset your Account Password.";
								header('Location:log_html.php');
					
							}
							else 
							{
								echo "<center><strong>*Email sending failed</center></strong>";
							}

							
						}
						else
						{
							echo "<center><strong>*No Email Found</center></strong>";
						}

			}
			else
			{
				echo "*SQL Statement Failed";
			}
			

	}

}


function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
