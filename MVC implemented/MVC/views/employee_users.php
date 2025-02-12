
<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}


function getallemp()
{

require "../model/db.php";

	$stmt = $conn->prepare("SELECT * FROM emp_info");
	$stmt->execute();
	$result = $stmt->get_result();

	$data = array();

	if($result->num_rows > 0){

				while($row = $result->fetch_assoc())
				{
					$data[]=array('id'=>$row["id"],'employee_name'=>$row["employee_name"],'daily_salary'=>$row["daily_salary"], 'total_days_in_month'=>$row["total_days_in_month"],'absent_days_allowed'=>$row["absent_days_allowed"],'absent_days'=>$row["absent_days"]);
				}




		} 

		$stmt->close();
		$conn->close();

		return $data;

		


}

		$emp_response= getallemp();
		echo json_encode($emp_response);




?>