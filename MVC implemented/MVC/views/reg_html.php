

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Registration</title>
</head>

<body>
	<?php include 'header.php'; 

	require "../controller/reg_html_control.php";
	$_SESSION['db']=true;

	?>

<center>
	<form method="post" onsubmit="return IsValidReg(this);" novalidate action="<?php echo $_SERVER["PHP_SELF"]; ?>" >

		
			<fieldset class="reg-fieldset">
				<img class="Regs-pic" src="reg.png" alt="Regs-Pic">


				<table>

					<tr class="reg-tr">
						<td class="reg-td">
							<input class="reg-input" type="text" id="name" name="name" placeholder="Full Name" value="<?php echo  $name; ?>">
							<br>

							<span id="fullname_err"></span>

							<span class=err>
								<?php echo $nameErr; ?>
							</span>
						</td>
					</tr>

					<tr class="reg-tr">

						<td class="reg-td">
							<input class="reg-input" type="tel" id="phone" name="phone" maxlength="11" placeholder="Phone Number" value="<?php echo  $phone; ?>">
							<br>

							<span id="phone_err"></span>

							<span class=err>
								<?php echo $phoneErr; ?>
							</span>
						</td>
					</tr>

					<tr class="reg-tr">

						<td class="reg-td">

							<input class="reg-input" type="email" id="email" name="email" placeholder="Email" value="<?php echo  $email; ?>">
							<br>

							<span id="email_err_reg"></span>

							<span class=err>
								<?php echo $emailErr; ?>
							</span>
						</td>
					</tr>


					<tr class="reg-tr">
						<td class="reg-td">

							<input class="reg-input" type="password" id="password" name="password" placeholder="Password" value="<?php echo  $password; ?>">
							<br>

							<span id="password_err_reg"></span>

							<span class=err>
								<?php echo $passwordErr; ?>
							</span>

						</td>
					</tr>
					<tr class="reg-tr">
						<td class="reg-td">

							<input class="reg-input" type="password" id="conpassword" name="conpassword" placeholder="Confirm Password" value="<?php echo  $conpassword; ?>">
							<br>

							<span id="confirmpassword_err"></span>

							<span class=err>
								<?php echo $conpasswordErr; ?>
							</span>

						</td>
					</tr>


				</table>
				<br>

				<p>Already have an account? <a href="log_html.php" class="reg-to-log">Login Here</a> </p>
				<br>

				<input class="reg-button" type="submit" name="register" value="Register">

			</fieldset>

			<br><br>


	</form>

	</center>




	<?php include 'footer.php'; ?>
	<script src="javascript/js_validate_reg.js"></script>
</body>

</html>