 


<?php

session_start();

require "../model/db.php";

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