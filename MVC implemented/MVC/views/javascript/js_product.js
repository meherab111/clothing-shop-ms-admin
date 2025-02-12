
function fetch_prod()
{

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function()
	{

		const obj_prod = JSON.parse(xhttp.responseText);

let table_prod="<table style='width: 100%;'>";


				table_prod+="<tr >";
				
					table_prod+="<th class='product-th'> Product Id   </th>";
					table_prod+="<th class='product-th'> Product Name </th>";
					table_prod+="<th class='product-th'> Quantity     </th>";
					table_prod+="<th class='product-th'> Sale Price   </th>";
					table_prod+="<th class='product-th'> Total Sale   </th>";
					table_prod+="<th class='product-th'> Buy Price    </th>";
					table_prod+="<th class='product-th'> Total Buy    </th>";
					table_prod+="<th class='product-th'> Profit       </th>";

				table_prod+="</tr>";

		for(let i = 0; i<obj_prod.length; i++)
		{
			table_prod += "<tr>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].id + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].product + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].qty + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].sale_price + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].total_sale + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].buy_price + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].total_buy + "</td>";
			table_prod += "<td class='product-td'>"+ obj_prod[i].profit + "</td>";
			table_prod += "</tr>";


		}

		table_prod+= "</table>";

		document.getElementById("data-product").innerHTML = table_prod;

	}
	xhttp.open("GET","product_users.php");
	xhttp.send();




}




