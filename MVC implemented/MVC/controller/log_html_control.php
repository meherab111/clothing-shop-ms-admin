	

	<?php
session_start();

require "../model/db.php";


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

			if (!preg_match("/^.{8,}$/", $password)) {
				$passwordErr = "*At least 8 characters required";
				$flag = true;
			}
		}




		if ($flag === false) {


			$_SESSION['email'] = $email;


			

			$status = "active";

			$email_search = "SELECT * FROM registered WHERE email = ?  AND
		status= ?";

			$stmt = mysqli_stmt_init($conn);

			if (mysqli_stmt_prepare($stmt, $email_search)) {
				mysqli_stmt_bind_param($stmt, 'ss', $email, $status);

				mysqli_stmt_execute($stmt);

				$search_result = mysqli_stmt_get_result($stmt);


				$email_count = mysqli_num_rows($search_result);

				if ($email_count > 0) {
					$email_pass = mysqli_fetch_assoc($search_result);
					$db_pass = $email_pass['password'];
					$pass_decode = password_verify($password, $db_pass);

					$_SESSION['pass'] = $pass_decode;

					if ($pass_decode) {


						if (isset($_POST['remember'])) {

							setcookie('email_cookie', $email, time() + 86400);

							$_SESSION['x'] = true;
							header('Location: ../views/dashboard.php');
						} else {
							$_SESSION['x'] = true;
							header('Location: ../views/dashboard.php');
						}
					} else {
						echo "<br>";
						echo "<center><strong>*Password Incorrect</strong></center>";
					}
				} else {
					echo "<br>";
					echo "<center><strong>*Email Incorrect</strong></center>";
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