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
$password = $email = "";
$passwordErr = $emailErr = "";

//Name 
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = false;



//User Name
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

	
	

    if ($flag === false) 
	{

		include "db.php";
	
		$email_search = "SELECT * FROM emp_app_req WHERE email = '$email'";
		$query = mysqli_query($conn, $email_search);
		$row = mysqli_fetch_assoc($query);
		if($row>0)
		{
			$status = $row['status'];
		}

		$email_search_2 = "SELECT * FROM emp_app_req WHERE email = '$email'";
		$query_2 = mysqli_query($conn, $email_search_2);
		$check_query_2 = mysqli_num_rows($query_2);

		
		if($check_query_2 == 1)
			{
				
				
				if($status == "Approved")
				{
					
						echo "<center><strong>Login Successfull</strong></center>";
						//header("Location: employee_dashboard.php");
					
				}
				else 
				{
					echo "<center><strong>Your Request Is Still On Pending</strong></center>";
					
				}

			}
				
		else 
			{
				
				echo "<center><strong>Incorrect Email / Password</strong></center>";

				
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

 
 
 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" novalidate>
    
        <center>
				 <p> <?php 
		 
		 if(isset($_SESSION['emp_msg']))
		 {		 
			 echo $_SESSION['emp_msg'];
		 }
		 else
		 {
			 echo $_SESSION['emp_msg'] = "";
			 
		 }

		 ?> </p> 
		
		<br>
                <fieldset style = "width:25%;">
                    <legend><strong>LOGIN</strong></legend>
					
						
                        <table>
     
                            <tr style="height:50px">
                                
                                <td style="width:20%; text-align:center">
                                    <label for="email">Email </label></td>
                                    <td>
									: <input type="email" id="email" name="email" value = "<?php echo  $email;?>">
									<br>
									<?php echo $emailErr;?>
                                </td>
                            </tr>
							
	
							<tr style="height:50px">
							<td style="width:20%; text-align:center">
								<?php echo "Password "?></td>
								
								<td>
								  : <input type="password" id="password" name="password" value = "<?php echo  $password;?>">
								  <br>
								  <?php echo $passwordErr;?>
	
							</td>
							
							</tr>

                        </table>
						
						 
						
						 <br><br>
						<p>Don't have any account? <a href ="emp_reg.php"> Register Here</a> </p>
						<br>
					<input type="submit" name="login" value="Login">
			
                    
                </fieldset>
				
           <br><br>
			
			
            </form>
			
        </center>        


			
</body>
<center>
<?php session_destroy(); ?>
<?php include 'footer.php';?>	
</center>
</html>
