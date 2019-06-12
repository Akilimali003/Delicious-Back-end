<?php
//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//Getting post data 
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$upassword = $_POST['upassword'];
		
		//checking if the received values are blank
		if($uname == '' || $uemail == '' || $upassword == ''){
			//giving a message to fill all values if the values are blank
			echo 'please fill all values';
		}else{
			//If the values are not blank
			//Connecting to our database by calling dbConnect script 
			require_once('dbconnect.php');
			
			//Creating an SQL Query to insert into database 
			//Here you may need to change the retrofit_users because it is the table I created
			//if you have a different table write your table's name
			
			//This query is to check whether the username or email is already registered or not 
			$sql = "SELECT * FROM USER WHERE uname='$uname' OR uemail='$uemail' OR upassword='$upassword'";
			
			//If variable check has some value from mysqli fetch array 
			//That means username or email already exist 
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			//Checking check has some values or not 
			if(isset($check)){
				//If check has some value that means username already exist 
				echo 'username or email already exist';
			}else{				
				//If username is not already exist 
				//Creating insert query 
				$sql = "INSERT INTO USER (uname, uemail, upassword) VALUES('$uname','$uemail','$upassword')";
				
				//Trying to insert the values to db 
				if(mysqli_query($con,$sql)){
					//If inserted successfully 
					echo 'successfully registered';
				}else{
					//In case any error occured 
					echo 'oops! Please try again!';
				}
			}
			//Closing the database connection 
			mysqli_close($con);
		}
}else{
echo 'error';
}

?>