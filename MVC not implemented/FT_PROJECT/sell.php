<?php
session_start();

$product = $quantity = $sale_price  = $buy_price = "";


//Name 
if (isset($_POST['submit'])) 
{
  
	
	
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];
		$sale_price = $_POST['sale_price'];
		$buy_price = $_POST['buy_price'];
	
	

	
			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "reg_info";

			// Create a database connection
			$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

			// Check the connection
			if ($conn) {
				echo "";
			}
			else
			{
				echo "Connection Failed";
			}

		
			

	//
				// Insert data into the database
				$insert_query = "insert into sale_info (product,qty,sale_price,buy_price)
				values ('$product', '$quantity', '$sale_price', '$buy_price')";
			
				$checkInsertQuery = mysqli_query($conn,$insert_query);
				
				if($checkInsertQuery)
				{
					echo "Data Inserted";
				} 
				
				echo "<br><br>"; //---------------------------------------
				
				$sql_1 = "update sale_info set total_sale = qty * sale_price";
				
				$checkQuery_1 = mysqli_query($conn,$sql_1);
				
					if($checkQuery_1)
				{
					echo "Total Price Done";
				}
				
					echo "<br><br>"; //---------------------------------------
				
				$sql_2 = "update sale_info set profit = total_sale - (qty * buy_price)";
				
				$checkQuery_2 = mysqli_query($conn,$sql_2);
				
					if($checkQuery_2)
				{
					echo "Profit Done";
				}
				echo "<br><br>"; //---------------------------------------
				
					$sql_3 = "update sale_info set total_buy = qty * buy_price";
				
				$checkQuery_3 = mysqli_query($conn,$sql_3);
				
					if($checkQuery_3)
				{
					echo "Total buy Done";
				}
				echo "<br><br>"; //---------------------------------------
				
					
				
					

}


?>

<html>
<body>
<table>

	<thead>
		<tr>
			<th>|Id|</th>
			<th>Product Name|</th>
			<th>Quantity|</th>
			<th>Sale Price|</th>
			<th>Total Sale|</th>
			<th>Buy Price|</th>
			<th>Total Buy|</th>
			<th>Profit|</th>
		</tr>
			
	</thead>
	
	<tbody>
	<?php
	
		
			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "reg_info";

			// Create a database connection
			$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

			// Check the connection
			if ($conn) {
				echo "";
			}
			else
			{
				echo "Connection Failed";
			}

		$sql_4 = "select sum(profit) as revenue from sale_info";
				
				$checkQuery_4 = mysqli_query($conn,$sql_4);
				
					if($checkQuery_4)
				{
					$row = mysqli_fetch_array($checkQuery_4);
					$sumcol1 = $row['revenue'];
					echo "REVENUE = <strong>$sumcol1</strong>";
					
				}
				echo "<br><br>"; //--------------------------------

		$sql_5 = "select sum(total_sale) as entire_sale from sale_info";
				
				$checkQuery_5 = mysqli_query($conn,$sql_5);
				
					if($checkQuery_5)
				{
					$row1 = mysqli_fetch_array($checkQuery_5);
					$sumcol2 = $row1['entire_sale'];
					echo "ENTIRE SALE =  <strong>$sumcol2</strong> " ;
					
				}
				echo "<br><br>"; //--------------------------------
				
				
				//select product, qty from sell_info order by qty desc limit 
				
				$sql_6 = "SELECT * FROM sale_info WHERE qty = (SELECT MAX(qty) FROM sale_info) LIMIT 10 ";
				$checkQuery_6 = mysqli_query($conn,$sql_6);

				if ($checkQuery_6)
					{
					while($fetch_1 = mysqli_fetch_array($checkQuery_6))
					{
						$ms_product = $fetch_1['product'];
						$ms_qty = $fetch_1['qty'];
						echo "The most sold product is <strong>'$ms_product'</strong> with the quantity of <strong>$ms_qty</strong> <br>" ;
						
					}
					
					
					
					} 
					
					echo "<br><br>"; //--------------------------------
					
		$select_query = "select * from sale_info ";
	

		$query = mysqli_query($conn, $select_query);
		
		$row_count = mysqli_num_rows($query);

		if($row_count > 0)
		{
			
			while($fetch = mysqli_fetch_array($query))
			{
		



	?>

		<tr>
			<td><center><?php echo $fetch['id'];?></center></td>
			<td><center><?php echo $fetch['product'];?></center></td>
			<td><center><?php echo $fetch['qty'];?></center></td>
			<td><center><?php echo $fetch['sale_price'];?></center></td>
			<td><center><?php echo $fetch['total_sale'];?></center></td>
			<td><center><?php echo $fetch['buy_price'];?></center></td>
			<td><center><?php echo $fetch['total_buy'];?></center></td>
			<td><center><?php echo $fetch['profit'];?></center></td>
			
		</tr>
		
		
	<?php	
			}
			
			
			
		}
  


	?>
	
	</tbody>
	

</table>

	<br> <br>	



<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate>
    
        
                <fieldset style = "width:25%;">
                    <legend><strong>Insert Data</strong></legend>
					
                    
                        <table>
                      
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Product "?> </td>
                                    <td>
                                : <input type="text" id="product" name="product" value = "<?php echo  $product;?>">
								<br>
								
                                </td>
                            </tr>
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Quantity "?> </td>
                                    <td>
                                : <input type="text" id="quantity" name="quantity" value = "<?php echo  $quantity;?>">
								<br>
								
                                </td>
                            </tr>
							
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Sale price "?> </td>
                                    <td>
                                : <input type="text" id="sale_price" name="sale_price" value = "<?php echo  $sale_price;?>">
								<br>
								
                                </td>
                            </tr>
							
							
                            <tr style="height:50px">
                                <td style="width:25%; text-align:center">
                                <?php echo "Buy price "?> </td>
                                    <td>
                                : <input type="text" id="buy_price" name="buy_price" value = "<?php echo  $buy_price;?>">
								<br>
								
                                </td>
                            </tr>
							
						</table>
							  <input type="submit" name="submit" value="submit">
				</fieldset>
		</form>
		</body>
</html>