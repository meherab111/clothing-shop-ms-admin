 
 <?php
session_start();
ob_start();
	if(!isset($_GET['token']))	
	{
		header("Location: ../views/log_html.php");
	}

?> 
<?php

require "../model/db.php";

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