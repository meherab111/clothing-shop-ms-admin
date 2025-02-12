<?php
session_start();
ob_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

</head>

<body>
	<?php include 'header.php'; ?>

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

			if (!preg_match("/^.{8,}$/", $password)) {
				$passwordErr = "*At least 8 characters required";
				$flag = true;
			}
		}




		if ($flag === false) {


			$_SESSION['email'] = $email;


			include "db.php";

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
							header('Location: dashboard.php');
						} else {
							$_SESSION['x'] = true;
							header('Location: dashboard.php');
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


	<center>

		<form class="log-form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" 
			novalidate onsubmit="return IsValidLog(this);">


			<p> <?php

				if (isset($_SESSION['notify'])) {
					echo $_SESSION['notify'];
				} else {
					echo  "";
				}

				?> </p>
			<br>
			<fieldset class="log-fieldset">
				<img class="login-pic" src="login.png" alt="Login-Pic">




				<table>

					<tr class="log-tr">


						<td class="log-td">

							<input class="log-input" type="email" id="email" name="email" placeholder="Email" 
							value="<?php if (isset($_COOKIE['email_cookie'])) {echo $_COOKIE['email_cookie'];} ?>">
							<br>

							<span id="email_err"></span>


							<span class=err>
								<?php echo $emailErr; ?>
							</span>
						</td>
					</tr>


					<tr class="log-tr">

						<td class="log-td">

							<input class="log-input" type="password" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">

							<br>
							<span id="password_err"></span>

							<span class=err>
								<?php echo $passwordErr; ?>
							</span>

						</td>

					</tr>

					<tr class="log-tr">
						<td class="log-check" align="center">
							<input type="checkbox" id="remember" name="remember"> Remember Me


						</td>

					</tr>

				</table>

				<br>
				<a href="password_reset.php" class="log-f-pass"> Forgot password? </a>
				<br>
				<p>Don't have any account? <a href="reg_html.php" class="log-reg"> Register Here</a> </p>
				<br>
				<input class="log-button" type="submit" name="login" value="Login">


			</fieldset>

			<br><br>


		</form>

	</center>



	<?php include 'footer.php'; ?>

	<script src="javascript/js_validate_login.js"></script>
</body>

</html>