<?php
session_start();
ob_start();
	if(!isset($_GET['token']))	
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
	<title>Change Password</title>
</head>
<body>
<?php include 'header.php';?>
  
<?php
$newpassword  = $conpassword = "";
$newpasswordErr = $conpasswordErr = "";

//Name 
if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    $flag = false;


// Password & Confirm Password
    if (empty($_POST["password"])) {
        $newpasswordErr = "*New Password is required";
        $flag = true;
    } else {
        $newpassword = sanitize($_POST["password"]);
		
		 if (!preg_match("/^.{8,}$/", $newpassword))
		{
            $newpasswordErr = "*At least 8 characters required";
            $flag = true;
        }

    }

    if (empty($_POST["conpassword"])) {
        $conpasswordErr = "*Confirm Password is required";
        $flag = true;
    } else {
        $conpassword = sanitize($_POST["conpassword"]);
    }

    if ($_POST["password"] != $_POST["conpassword"]) {
        $conpasswordErr = "*Passwords doesn't match";
        $flag = true;
    }
	
	



    if ($flag === false) 
	    {
			
			
			if(isset($_GET['token']))	
			{
				
				include "db.php";
				$token = $_GET['token'];

				$hash_Password = password_hash($newpassword,PASSWORD_BCRYPT); // Hash the password
					
				if ($newpassword == $conpassword)
				{
		
					
					$update_query = "UPDATE registered SET password= ? WHERE
					token= ?";

					$stmt = mysqli_stmt_init($conn);

					if(mysqli_stmt_prepare($stmt,$update_query))
					{

						mysqli_stmt_bind_param($stmt, 'ss', $hash_Password, $token);

						mysqli_stmt_execute($stmt);

						$update_result = mysqli_stmt_get_result($stmt);

						$_SESSION['notify'] = "Your Password has been Updated.";
						header('Location: log_html.php');

					}
					else
					{
						echo "*SQL Statement Failed";
					}


				}
				else
				{
					echo $_SESSION['msg'] = "Your Password is Not Matching.";
				}
				
			}

			else
			{
			echo "<center><strong>*No Token Found</center></strong>";
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


