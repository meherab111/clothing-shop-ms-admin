	<?php	
	
			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "reg_info";

			// Create a database connection
			$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

			
			if ($conn -> connect_error) {
				die("Connection Failed: " . $conn -> connect_error );
			}

		
	?>