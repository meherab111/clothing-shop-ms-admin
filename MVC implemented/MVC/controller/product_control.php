	
<?php
session_start();

if (!isset($_SESSION['x'])) 
{
	header("Location: ../views/log_html.php");
}
	
?>



	<?php


		
			require "../model/db.php";

				$sql_rev = "SELECT SUM(profit) AS revenue FROM sale_info";

				$stmt = mysqli_stmt_init($conn);

				if(mysqli_stmt_prepare($stmt, $sql_rev))
				
				{

					mysqli_stmt_execute($stmt);


					$rev_result = mysqli_stmt_get_result($stmt);

					
						echo "<strong><u>Calculated Total Revenue and Sales: </u></strong>";
						
				
				
					$fetch_rev = mysqli_fetch_assoc($rev_result);
					$revenue = $fetch_rev['revenue'];
					?>
					<div class="mst-prod">
					Total Revenue = &nbsp;<strong><?php echo $revenue;?>/-</strong>
				</div>
					<?php
				}
				else
				{
					echo "*SQL Statement Failed";
				}
				
			
			
					
			
				 //------------------------------------------------------------
				echo "<br>";

				$sql_tot_sale = "SELECT SUM(total_sale) AS entire_sale FROM sale_info";

				$stmt = mysqli_stmt_init($conn);


				if(mysqli_stmt_prepare($stmt, $sql_tot_sale))
				
				{

					mysqli_stmt_execute($stmt);

					$tot_sale_result = mysqli_stmt_get_result($stmt);

					$fetch_sale = mysqli_fetch_array($tot_sale_result);
					$entire_sale = $fetch_sale['entire_sale'];

					?>
					<div class="mst-prod">
					Total Sale =  &nbsp;<strong><?php echo $entire_sale;?>/-</strong>
				</div>
					<?php
				}
				else
				{
					echo "*SQL Statement Failed";
				}
			
				 //----------------------------------------------------------------
				echo "<br><br>";
				
				
				//select product, qty from sell_info order by qty desc limit 

				
				
				$sql_max_qty = "SELECT * FROM sale_info WHERE qty = (SELECT MAX(qty) FROM sale_info) LIMIT 10 ";

					$stmt = mysqli_stmt_init($conn);


				if(mysqli_stmt_prepare($stmt, $sql_max_qty))
				
				{

					mysqli_stmt_execute($stmt);


					$max_qty_result = mysqli_stmt_get_result($stmt);
					?>

					<div class="Most-sold">
					<strong><u>Most Sold Products: </u></strong>
					</div>
				<?php						
						
					while($fetch_qty = mysqli_fetch_array($max_qty_result))
						{
							$ms_product = $fetch_qty['product'];
							$ms_qty = $fetch_qty['qty'];

							?>

							<div class="mst-prod">
							The most sold product is &nbsp;<strong>
							<?php echo $ms_product;?></strong>&nbsp; with the quantity of &nbsp;<strong><?php echo $ms_qty;?>
							</strong>
						</div>
							<?php
						}
				}
				else
				{
					echo "*SQL Statement Failed";
				}
			


					//--------------------------------------------------------------------------
					echo "<br><br>"; 
					
		$select_query = "select * from sale_info ";
		
		$stmt = mysqli_stmt_init($conn);

		if(mysqli_stmt_prepare($stmt,$select_query))
		{

			mysqli_stmt_execute($stmt);

			$select_result = mysqli_stmt_get_result($stmt);

					
					$row_count = mysqli_num_rows($select_result);

					if($row_count > 0)
					{
						
						
						while($fetch = mysqli_fetch_array($select_result))
						{
					



				?>

<!-- 					<tr>
						<td class="product-td"><?php //echo $fetch['id'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['product'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['qty'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['sale_price'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['total_sale'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['buy_price'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['total_buy'];?> &nbsp &nbsp </td>
						<td class="product-td"><?php //echo $fetch['profit'];?> &nbsp &nbsp </td>
						
					</tr> -->
					
					
				<?php	
						}
						?>
						
						 <div class="prod-det">
						<strong><u>Product details: </u></strong>
					  <br>
					</div>
					<?php
						
					}

					?>

					<button class="prod_data" onclick="fetch_prod();">View Product Details</button>
	<?php	  
  		}
  		else
  		{
  			echo "*SQL Statement Failed";
  		}


	?>