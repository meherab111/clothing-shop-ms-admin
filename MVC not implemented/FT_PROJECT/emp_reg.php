<?php
session_start();

?>
 
 <?php include 'header.php';?>
<!DOCTYPE html>
<html>
<body>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  
<?php
$name = $email = $password  = $conpassword = "";
$nameErr = $emailErr = $passwordErr = $conpasswordErr = "";

//Name 
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = false;
	
	    if (empty($_POST["name"])) {
        $nameErr = "*Name is required";
        $flag = true;
    } else {
        $name = sanitize($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "*Only letters and white space allowed";
            $flag = true;
        }
    }

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

// Password & Confirm Password
    if (empty($_POST["password"])) {
        $passwordErr = "*Password is required";
        $flag = true;
    } else {
        $password = sanitize($_POST["password"]);
		
		 if (!preg_match("/^.{8,}$/", $password))
		{
            $passwordErr = "*At least 8 characters required";
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
	
	
			include "db.php";

			// Check if the email already exists in the database
			$checkEmailQuery = "SELECT * FROM emp_app_req WHERE email = '$email'";
			$query = mysqli_query($conn,$checkEmailQuery);
			
			$email_count = mysqli_num_rows($query);

			if ($email_count  > 0) {
				echo "<center><strong>*This Email already exists</strong></center>";
				
				
			} 
			else {
				
				
				

				$hash_Password = password_hash($password,PASSWORD_BCRYPT); // Hash the password
				// Insert data into the database
				$insert_query = "INSERT INTO emp_app_req (name,email,password,status)
				VALUES ('$name','$email','$hash_Password','Pending')";
			
				$checkInsertQuery = mysqli_query($conn,$insert_query);

				if ($checkInsertQuery)
				{
					
				$_SESSION['emp_msg'] = "<strong>$email</strong>,Your Request Is On Pending...";
				header('Location:emp_login.php');
					
				}
				else 
					
				{
					echo "<center><strong>*Error in Query</center></strong>";
				}


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


 <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate>
    
        <center>
                <fieldset style = "width:25%;">
                    <legend><strong>REGISTRATION</strong></legend>
					
                    
                        <table>
						        <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Name "?> </td>
                                    <td>
                                : <input type="text" id="name" name="name" value = "<?php echo  $name;?>">
								<br>
								<?php echo $nameErr;?>
                                </td>
                            </tr>
                     

                            <tr style="height:50px">
                                
                                <td style="width:25%; text-align:center">
                                    <label for="email">Email </label></td>
                                    <td>
									: <input type="email" id="email" name="email" value = "<?php echo  $email;?>">
									<br>
									<?php echo $emailErr;?>
                                </td>
                            </tr>
	
	
							<tr style="height:50px">
							<td style="width:25%; text-align:center">
								<?php echo "Password "?></td>
								
								<td>
								  : <input type="password" id="password" name="password" value = "<?php echo  $password;?>">
								  <br>
								  <?php echo $passwordErr;?>
								  
							</td>
							</tr>
							<tr style="height:50px">
							<td style="width:25%; text-align:center">
								<label for="conpassword">Confirm Password </label>
								</td>
								
								<td>
								  : <input type="password" id="conpassword" name="conpassword" value = "<?php echo  $conpassword;?>">
								  <br>
								  <?php echo $conpasswordErr;?>
								 
							</td>
							</tr>


                        </table>
						
						
						<p>Already have an account? <a href ="emp_login.php">Login Here</a> </p>
						<br>
				
					<input type="submit" name="register" value="Register">
	 
                </fieldset>
				
           <br><br>
			
			
            </form>
			
        </center>        


			
</body>
<center>
<?php include 'footer.php';?>	
</center>
</html>
