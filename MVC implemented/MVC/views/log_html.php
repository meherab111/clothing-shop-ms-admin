

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

</head>

<body>
<?php include 'header.php'; 



require "../controller/log_html_control.php";
$_SESSION['db']=true;
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