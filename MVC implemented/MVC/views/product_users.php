
<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}


function getallprod()
{

	require "../model/db.php";

	$stmt = $conn->prepare("SELECT * FROM sale_info");
	$stmt->execute();
	$result = $stmt->get_result();

	$data_prod = array();

	if($result->num_rows > 0){

				while($row = $result->fetch_assoc())
				{
					$data_prod[]=array('id'=>$row["id"],'product'=>$row["product"],'qty'=>$row["qty"], 'sale_price'=>$row["sale_price"],'total_sale'=>$row["total_sale"],'buy_price'=>$row["buy_price"],'total_buy'=>$row["total_buy"],'profit'=>$row["profit"]);
				}


		} 

		$stmt->close();
		$conn->close();

		return $data_prod;

		


}

		$prod_response= getallprod();
		echo json_encode($prod_response);




?>