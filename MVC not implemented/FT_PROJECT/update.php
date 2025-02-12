// <?php
// session_start();

// ?>

// <!DOCTYPE html>
// <html>
// <body>
// <head>
	// <meta charset="utf-8">
	// <meta name="viewport" content="width=device-width, initial-scale=1">
// </head>
  
// <?php
// $name = $email = $phone = $password  = "";
// $nameErr = $emailErr = $phoneErr = $passwordErr = "";

// //Name 
// if ($_SERVER['REQUEST_METHOD'] === "POST") 
// {
    // $flag = false;

    // if (empty($_POST["name"])) {
        // $nameErr = "*Name is required";
        // $flag = true;
    // } else {
        // $name = sanitize($_POST["name"]);
        // if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            // $nameErr = "*Only letters and white space allowed";
            // $flag = true;
        // }
    // }
// //Phone 
    // if (empty($_POST["phone"])) {
        // $phoneErr = "*Phone is required";
        // $flag = true;
    // } else {
        // $phone = sanitize($_POST["phone"]);
        // if (!preg_match("/^\d+$/", $phone)) {
            // $phoneErr = "*Only numbers allowed";
            // $flag = true;
        // }
		// else if (!preg_match("/^0[1-9][0-9]{9}$/", $phone)) {
            // $phoneErr = "*Only BD number format allowed";
            // $flag = true;
        // }
    // }
// //Email
    // if (empty($_POST["email"])) {
        // $emailErr = "*Email is required";
        // $flag = true;
    // } else {
        // $email = sanitize($_POST["email"]);
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // $emailErr = "*Invalid Email format";
            // $flag = true;
        // }
    // }



		// if ($flag === false) 
		// {
	
			// $_SESSION['email'] = $email;

				// include "db.php";
				// $id_update = $_GET['id'];

				// // Insert data into the database
				// $update_query = "UPDATE registered SET name = '$name',phone = '$phone',
				// email = '$email' WHERE id = '$id_update'";
				
				
				// $checkUpdateQuery = mysqli_query($conn,$update_query);
						

				// if ($checkUpdateQuery)
				// {

					// echo "Data Updated";

				// }
			


			// }

// }


// function sanitize($data) {
    // $data = trim($data);
    // $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    // return $data;
// }
// ?>

 
 // <?php include 'header.php';?>
 // <form method="post" action="" novalidate>
    
        // <center>
                // <fieldset style = "width:25%;">
                    // <legend><strong>Update Profile</strong></legend>
					
					// <?php	
						// include "db.php";
						// $id = $_GET['id'];
						
						// $show_query = "SELECT * FROM registered WHERE id = '$id'";
						
						// $show_data = mysqli_query($conn, $show_query);
						
						// $arr_data = mysqli_fetch_array($show_data);
						
					// ?>
                    
                        // <table>
                      
                            // <tr style="height:50px">
                                // <td style="width:25%; text-align:center">
                                // <?php echo "Name "?> </td>
                                    // <td>
                                // : <input type="text" id="name" name="name" value = "<?php echo $arr_data['name'];?>">
								// <br>
								// <?php echo $nameErr;?>
                                // </td>
                            // </tr>

                           // <tr style="height:50px">
                                
                                // <td style="width:25%; text-align:center" >
                                    // <label for="phone">Phone Number </label></td>
                                  // <td >  
								  // : <input type="tel" id="phone" name="phone" maxlength="11" value = "<?php echo $arr_data['phone'];?>" >
								  // <br>
								  // <?php echo $phoneErr;?>
                                // </td>
                            // </tr>

                            // <tr style="height:50px">
                                
                                // <td style="width:25%; text-align:center">
                                    // <label for="email">Email </label></td>
                                    // <td>
									// : <input type="email" id="email" name="email" value = "<?php echo $arr_data['email'];?>">
									// <br>
									// <?php echo $emailErr;?>
                                // </td>
                            // </tr>
	
	


                        // </table>
						
						
						
						// <br>
				
					// <input type="submit" name="update" value="UPDATE">
	 
                // </fieldset>
				
			
				
           // <br><br>
			
			
            // </form>
			
        // </center>        
		// <center> <a href ="display.php">Go Back</a></center> 
		// <br>

			
// </body>
// <center>
// <?php include 'footer.php';?>	
// </center>
// </html>
