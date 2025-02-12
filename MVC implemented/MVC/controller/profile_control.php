
<?php

require "../model/db.php";
$name  = $phone = $password  = "";
$nameErr  = $phoneErr = $passwordErr = "";

//Name 
if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    $flag = false;

    if (empty($_POST["name"])) {
        $nameErr = "*Name is required";
        $flag = true;
    } else {
        $name = sanitize($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "*Only letters and white space allowed";
            $flag = true;
        }
    }
//Phone 
    if (empty($_POST["phone"])) {
        $phoneErr = "*Phone is required";
        $flag = true;
    } else {
        $phone = sanitize($_POST["phone"]);
        if (!preg_match("/^\d+$/", $phone)) {
            $phoneErr = "*Only numbers allowed";
            $flag = true;
        }
		else if (!preg_match("/^0[1-9][0-9]{9}$/", $phone)) {
            $phoneErr = "*Only BD number format allowed";
            $flag = true;
        }
    }




		if ($flag === false) 
		{
	
			$_SESSION['email'] = $email;

				$id_updates = $fetch['id'];

				// Insert data into the database
				$update_query = "UPDATE registered SET name = ?,phone = ?
				 WHERE id = ?";
				
				$stmt = mysqli_stmt_init($conn);

				if(mysqli_stmt_prepare($stmt,$update_query))

				{
					mysqli_stmt_bind_param($stmt,'ssi', $name, $phone, $id_updates);
					mysqli_stmt_execute($stmt);

					$update_result = mysqli_stmt_get_result($stmt);
					echo "<br>";
					echo "<center><p style='font-size:20px; color: green;'>Profile Updated Succesfully !!</p></center>";

				}
				else
				{
					echo "*SQL Statement Failed";
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