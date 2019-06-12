<?php
//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//Getting post data 

		$r_name = $_POST['r_name'];
		$r_location = $_POST['r_location'];
		$r_phone = $_POST['r_phone'];
		$r_opening_Closing_Time = $_POST['r_opening_Closing_Time'];
        $r_website=$_POST['r_website'];
        $r_email = $_POST['r_email'];
		$r_details = $_POST['r_details'];
        $r_image=$_POST['r_image'];
        $r_latitude = $_POST['r_latitude'];
		$r_longitude = $_POST['r_longitude'];
		
		//checking if the received values are blank
		if($r_name == '' || $r_location == '' || $r_opening_Closing_Time == ''){
			//giving a message to fill all values if the values are blank
			echo 'please fill all values';
		}else{
			//If the values are not blank
			//Connecting to our database by calling dbConnect script 
			require_once('dbconnect.php');
			
							
				//If username is not already exist 
				//Creating insert query 
				$sql = "INSERT INTO restaurant (r_name,r_location,r_phone,r_opening_Closing_Time,r_website,r_email, r_details, r_image, r_latitude,r_longitude) VALUES('$r_name','$r_location','$r_phone','$r_opening_Closing_Time','$r_website','$r_email', '$r_details', '$r_image', '$r_latitude', '$r_longitude')";
				
				//Trying to insert the values to db 
				if(mysqli_query($con,$sql)){
					//If inserted successfully 
					echo 'successfully registered';
				}else{
					//In case any error occured 
					echo 'oops! Please try again!';
				}
			
			//Closing the database connection 
			mysqli_close($con);
		}
}else{
echo 'error';
}

?>