

<?php
session_start();
ob_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: log_html.php");
}	
	
	
?>


<?php

	
		$email = $_SESSION['email'];
		
		include "db.php";

		$select_query = "SELECT * FROM registered WHERE email = ?";

		$stmt = mysqli_stmt_init($conn);

		if(mysqli_stmt_prepare($stmt,$select_query))
        {

        	mysqli_stmt_bind_param($stmt,'s', $email);
                        
            mysqli_stmt_execute($stmt);

            $up_result = mysqli_stmt_get_result($stmt);
				
				$email_count = mysqli_num_rows($up_result);

				if($email_count > 0)
				{
					$fetch = mysqli_fetch_array($up_result);
					$passdb = $fetch['password'];
				}

		 }

        else
        {
            echo "SQL statement failed";
        }
	


$oldpassword = isset($_REQUEST['opasswrd']) ? $_REQUEST['opasswrd'] : "x";
$newpassword = isset($_REQUEST['npasswrd']) ? $_REQUEST['npasswrd'] : "x";
$conpassword = isset($_REQUEST['cpasswrd']) ? $_REQUEST['cpasswrd'] : "x";

$pass_decode = password_verify($oldpassword,$passdb );
$passuser = $pass_decode;


if($oldpassword ==="" || $newpassword ==="" || 
$conpassword ==="")
{

	echo "<center><p style='font-size:20px; color: red;'>*Password Field Empty</p></center>";
}
elseif (strlen($oldpassword) <8 || strlen($newpassword) <8 || 
	strlen($conpassword) <8 )
{
	echo "<center><p style='font-size:20px; color: red;'>*At Least 8 Character Required</p></center>";
}
elseif ($oldpassword != $passuser) 
{
	echo "<center><p style='font-size:20px; color: red;'>*Old Password Doesn't Match</p></center>";
}
elseif ($oldpassword != $newpassword) 
{
	
			if($newpassword == $conpassword)
							{
								$hash_newPassword = password_hash($newpassword,PASSWORD_BCRYPT);

								$update_pass = "UPDATE registered SET password= ? WHERE email = ? ";

							       $stmt = mysqli_stmt_init($conn);

              
					                if(mysqli_stmt_prepare($stmt,$update_pass))
					                {
					                    mysqli_stmt_bind_param($stmt,'ss',$hash_newPassword, $email);
					                  
					                    mysqli_stmt_execute($stmt);

					                    $up_result = mysqli_stmt_get_result($stmt);

					                  echo "<center><p style='font-size:20px; color: green;'>Password Updated Succesfully !!</p></center>";

					                }
					                else
					                {
					                    
					                    echo "SQL statement failed";
					                }
							
									
							}
							
							else
							{
								echo "<center><p style='font-size:20px; color: red;'>*New Password And Confirm Password Doesn't Match</p></center>";
							}
					

	
}

else
{
	echo "<center><p style='font-size:20px; color: red;'>*Passwords Are Same</p></center>";
	
}
			

?>
