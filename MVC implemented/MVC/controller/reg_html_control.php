<?php
session_start();

?>
<?php
require "../model/db.php";
	$name = $email = $phone = $password  = $conpassword = "";
	$nameErr = $emailErr = $phoneErr = $passwordErr = $conpasswordErr = "";

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
		//Phone 
		if (empty($_POST["phone"])) {
			$phoneErr = "*Phone Number is required";
			$flag = true;
		} else {
			$phone = sanitize($_POST["phone"]);
			if (!preg_match("/^\d+$/", $phone)) {
				$phoneErr = "*Only numbers allowed";
				$flag = true;
			} else if (!preg_match("/^0[1-9][0-9]{9}$/", $phone)) {
				$phoneErr = "*Only BD number format allowed";
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

			if (!preg_match("/^.{8,}$/", $password)) {
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




		if ($flag === false) {
			$token = bin2hex(random_bytes(15));


			$_SESSION['email'] = $email;

		


			$checkEmailQuery = "SELECT * FROM registered WHERE email = ?";

			$stmt = mysqli_stmt_init($conn);

			if (mysqli_stmt_prepare($stmt, $checkEmailQuery)) {
				mysqli_stmt_bind_param($stmt, 's', $email);

				mysqli_stmt_execute($stmt);

				$check_result = mysqli_stmt_get_result($stmt);



				$email_count = mysqli_num_rows($check_result);


				if ($email_count  > 0) {
					echo "<center><strong>*This Email already exists</strong></center>";
				} else {

					$status = "inactive";

					$hash_Password = password_hash($password, PASSWORD_BCRYPT); // Hash the password



					$insert_query = "INSERT INTO registered (name,phone,email,password,token,status)
						VALUES (?, ?, ?, ?, ?, ?)";

					$stmt = mysqli_stmt_init($conn);

					if (mysqli_stmt_prepare($stmt, $insert_query)) {
						mysqli_stmt_bind_param($stmt, 'ssssss', $name, $phone, $email, $hash_Password, $token, $status);

						mysqli_stmt_execute($stmt);


						$insert_result = mysqli_stmt_get_result($stmt);


						// email authentication
						$_SESSION['y'] = true;


						$subject = "Account Email Verification.";
						$body = "Hello, $name.\n";
						$body .= "Please click this link to Verify your Account - \n";
						$body .=
							"http://localhost/FINAL/FT_PROJECT/verify.php?token=$token \n\n";

						$sender = "From: clothingshop618@gmail.com";

						if (mail($email, $subject, $body, $sender)) {
							$_SESSION['notify'] = "Check your Email- <strong>$email</strong>, to verify your Account.";
							header('Location:log_html.php');
						} else {
							echo "<center><strong>*Email sending failed</center></strong>";
						}
					} else {
						echo "*SQL Statement Failed";
					}
				}
			} else {

				echo "*SQL Statement Failed";
			}
		}
	}

	function sanitize($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>