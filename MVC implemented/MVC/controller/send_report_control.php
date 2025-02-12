<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}
?>


<?php
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