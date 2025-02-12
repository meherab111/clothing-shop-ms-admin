<?php
session_start();
include "db.php";
if (!isset($_SESSION['x'])) 
{
	header("Location: log_html.php");
}	

	if(!isset($_SESSION['email']))
		{
			echo "error";
		}


if(isset($_POST['upload']) && !empty($_FILES["image"]["name"]))
	

	{
		$email = $_SESSION['email'];
		
		$image_tmp = $_FILES['image']['tmp_name'];
		$image = $_FILES['image']['name'];
		
		$img_exs = pathinfo($image, PATHINFO_EXTENSION);
		$img_exs_lc = strtolower($img_exs);
		
		$allowed_exs = array("jpg","jpeg","png");
		
		if(in_array($img_exs_lc,$allowed_exs))
			
			{
				$new_image = uniqid("IMAGE-",true).".".$img_exs_lc;
				$image_img_path = 'img/'.$new_image;
				
				
				$insert_image_query = "UPDATE registered SET image = ? WHERE email= ?";

				$stmt = mysqli_stmt_init($conn);

				if(mysqli_stmt_prepare($stmt,$insert_image_query))
                {
                    mysqli_stmt_bind_param($stmt,'ss' ,$new_image,$email);
                  
                    mysqli_stmt_execute($stmt);

                    $image_result = mysqli_stmt_get_result($stmt);

					move_uploaded_file(	$image_tmp, $image_img_path );
					//move_uploaded_file($_FILES['image']['tmp_name'],"img/". $image );
					$_SESSION['img'] = "<center><p style='font-size:20px; color: green;'>Image Updated Succesfully !!</p></center>";

					header("Location: display.php");
                    
                }
                else
                {
                    
                    echo "SQL statement failed";
                }
				
				
			}
		
			else
			{
			$_SESSION['img'] = "<center><p style='font-size:20px; color: red;'>*You can't Upload this Extension File.</p></center>";
			header("Location: display.php");	
			}
			
		
		
	}
	
	else
		
	{ 
		$_SESSION['img'] = "<center><p style='font-size:20px; color: red;'>*Please choose a Image File.</p></center>";
		header("Location: display.php");
	}

?>