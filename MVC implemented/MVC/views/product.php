
 		
<!DOCTYPE html>				
<html>

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<title>Product</title>
	</head>
<body>
<?php include 'header.php';?>	


	<h2 class ="product-header">Product Details</h2>
<div class="emp-div">
<table>

<!-- 	<thead>
		<tr>
			<th class="product-th"> Product Id   </th>
			<th class="product-th"> Product Name </th>
			<th class="product-th"> Quantity     </th>
			<th class="product-th"> Sale Price   </th>
			<th class="product-th"> Total Sale   </th>
			<th class="product-th"> Buy Price    </th>
			<th class="product-th"> Total Buy    </th>
			<th class="product-th"> Profit       </th>
		</tr>
			
	</thead> -->
	
	<tbody>
			<tr>
			<td>
				<p id="data-product"></p>
			</td>
			</tr>
	
<?php require "../controller/product_control.php"; ?>
	
	</tbody>
	
	
	

</table>
</div>
		<br><br><br>
		<a href ="dashboard.php" class="product-goback" >  <img class="img-back" src="back.png" alt="Go Back Button">  
		</a>
		<br><br><br>


<?php include 'footer.php';?>
<script src="javascript/js_product.js"></script>	
</body>
</html>

