<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: log_html.php");
}
?>

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
  
<?php
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

			
	include "db.php";
 
	$select_sql = "SELECT * FROM emp_info";

	$stmt = mysqli_stmt_init($conn);

	if(mysqli_stmt_prepare($stmt, $select_sql))
	{

		mysqli_stmt_execute($stmt);

		$sql_result = mysqli_stmt_get_result($stmt);


		$row_count = mysqli_num_rows($sql_result);
					

					if ($row_count > 0) 

					{
						$total_wage = 0;
						
						while($fetch_emp = mysqli_fetch_array($sql_result))
							{
									$employee_name = $fetch_emp['employee_name'];
									$daily_salary = $fetch_emp['daily_salary'];
									$total_days_in_month = $fetch_emp['total_days_in_month'];
									$absent_days_allowed = $fetch_emp['absent_days_allowed'];
									$absent_days = $fetch_emp['absent_days'];
									
									
								
								if ($absent_days <= $absent_days_allowed)
									{
								  
									$total_salary = ($daily_salary * $total_days_in_month);
									} 
								else 
									{
									
									$deduction = (($absent_days - $absent_days_allowed) * $daily_salary);
									$total_salary = (($daily_salary * $total_days_in_month) - $deduction);
									
									}

									$total_wage = ($total_wage + $total_salary);
									
							}

	
					} 


	}
	else
	{
		echo "*SQL Statement Failed";
	}
	
		
//----------------------------------------------------------------------------------------------------
				$sql_rev = "SELECT SUM(profit) AS revenue FROM sale_info";

				$stmt = mysqli_stmt_init($conn);

				if(mysqli_stmt_prepare($stmt, $sql_rev))
				
				{

					mysqli_stmt_execute($stmt);


					$rev_result = mysqli_stmt_get_result($stmt);
				
					$fetch_rev = mysqli_fetch_assoc($rev_result);
					$revenue = $fetch_rev['revenue'];
					

				}
				else
				{
					echo "*SQL Statement Failed";
				}
//-----------------------------------------------------------------------------------------------				
				echo "<br>";

				$sql_tot_sale = "SELECT SUM(total_sale) AS entire_sale FROM sale_info";

				$stmt = mysqli_stmt_init($conn);


				if(mysqli_stmt_prepare($stmt, $sql_tot_sale))
				
				{

					mysqli_stmt_execute($stmt);

					$tot_sale_result = mysqli_stmt_get_result($stmt);

					$fetch_sale = mysqli_fetch_array($tot_sale_result);
					$entire_sale = $fetch_sale['entire_sale'];
					
				}
				else
				{
					echo "*SQL Statement Failed";
				}

//--------------------------------------------------------------------------------------------			
					$dte = 	date('F Y');
					
					$subject = "Clothing Shop Report - $dte";

					$body = "Monthly Report - $dte\n\n";

					$body .= "Sale Details :\n";

					$body .= "REVENUE : $revenue /-\n";

					$body .= "TOTAL SALE : $entire_sale /-\n\n";

					$body .= "Employee Details :\n";

					$body .= "TOTAL EMPLOYEE WAGE : $total_wage /-\n\n\n";

					$body .= "--- Thank You ---\n\n";

					// "Report Of This Month : \r
					// Sale Details : \r
					// TOTAL REVENUE = $revenue \r
					// TOTAL SALE = $entire_sale \r
					// \n
					// Employee Details : \r
					// TOTAL EMPLOYEE WAGE = $total_wage 
					// \n
					// Thank You.";

					$sender = "From: clothingshop618@gmail.com";

					if (mail($email, $subject, $body, $sender)) 
					{
						echo "<br>";
						echo "<center>Email Sent To, <strong>'$email'</strong>.</center>";
						
						
			
					}
					else 
					{
						echo "<center><strong>*Email sending failed</center></strong>";
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

