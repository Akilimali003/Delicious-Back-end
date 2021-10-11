<?php
//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//Getting post data 

		$id = $_POST['id'];
		$c_name = $_POST['c_name'];
		$c_contact = $_POST['c_contact'];
		$c_email = $_POST['c_email'];
        
		
		//checking if the received values are blank
		if($id == '' || $c_name == '' || $c_contact == '' || $c_email == ''){
			//giving a message to fill all values if the values are blank
			echo 'please fill all values about the customer';
		}else{
			//If the values are not blank
			//Connecting to our database by calling dbConnect script 
			require_once('dbconnect.php');
			
							
				//If username is not already exist 
				//Creating insert query 
				$sql = "INSERT INTO customer (id, c_name, c_contact, c_email) VALUES('$r_name', '$id', '$c_name', '$c_contact', '$c_email')";
				
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