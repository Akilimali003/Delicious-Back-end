<?php
//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//Getting post data 

		$Table_Number = $_POST['Table_Number'];
		$Details = $_POST['Details'];
		$rid = $_POST['rid'];
		$tstatus = $_POST['tstatus'];

		
		//checking if the received values are blank
		if($Table_Number == '' || $Details == '' || $rid == '' || $tstatus == ''){
			//giving a message to fill all values if the values are blank
			echo 'please fill all values';
		}else{
			//If the values are not blank
			//Connecting to our database by calling dbConnect script 
			require_once('dbconnect.php');
			
							
				//If username is not already exist 
				//Creating insert query 
				$sql = "INSERT INTO tables (Table_Number, Details, rid, tstatus) VALUES('$Table_Number', '$Details', '$rid', '$tstatus')";
				
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