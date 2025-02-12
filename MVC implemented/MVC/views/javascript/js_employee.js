
function fetch_emp()
{

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function()
	{

		const obj = JSON.parse(xhttp.responseText);

let table="<table style='width: 100%;'>";

				table+="<tr >";
				
					table+="<th class='employee-th'> Employee ID  		  </th>";
					table+="<th class='employee-th'> Employee name       </th>";
					table+="<th class='employee-th'> Daily salary	  	  </th>";
					table+="<th class='employee-th'> Total days in month </th>";
					table+="<th class='employee-th'> Absent days allowed </th>";
					table+="<th class='employee-th'> Absent days		  </th>";

				table+="</tr>";

		for(let i = 0; i<obj.length; i++)
		{
			table += "<tr>";
			table += "<td class='employee-td'>"+ obj[i].id + "</td>";
			table += "<td class='employee-td'>"+ obj[i].employee_name + "</td>";
			table += "<td class='employee-td'>"+ obj[i].daily_salary + "</td>";
			table += "<td class='employee-td'>"+ obj[i].total_days_in_month + "</td>";
			table += "<td class='employee-td'>"+ obj[i].absent_days_allowed + "</td>";
			table += "<td class='employee-td'>"+ obj[i].absent_days + "</td>";
			table += "</tr>";


		}

		table+= "</table>";

		document.getElementById("data-emp").innerHTML = table;

	}
	xhttp.open("GET","employee_users.php");
	xhttp.send();




}




