

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Send Report</title>
</head>
<body>
 <?php include 'header.php';?>


<h2 class ="send-report-header">Send Report</h2>
  
<?php require "../controller/send_report_control.php"; ?>
 
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" 
		onsubmit="return IsValidSendRep(this);" novalidate>
    
		<center>
		<br>
		<br>
        
                <fieldset class="send-report-fieldset">

                    <img class="reprt-msg" src="message.png" alt="Send Report"> 
					
                   <br>
                        <table>
     
                                <tr class="send-report-tr">
                                

                                    <td class="send-report-td">
									<input class="send-report-input" type="email" placeholder="Enter Email Address"id="email" name="email" value = "<?php echo  $email;?>">
									<br>

									<span id="email_err_send_rep"></span>

									<span class=err>
									<?php echo $emailErr;?>
								</span>
                                </td>
                            </tr>
	
                        </table>
					
						
					<input class="send-report-button" type="submit" name="send_report" value="Send Report">
						<br>
						<br>
				
                </fieldset>
				
		</center>

	</form>	
			
				<br><br><br>

			<a href ="dashboard.php" class="employee-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
			</a>   
				<br><br><br>

<?php include 'footer.php';?>	
<script src="javascript/js_validate_send_rep.js"></script>					
</body>
</html>

