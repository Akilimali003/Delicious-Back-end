<?php
//checking if the script received a post request or not 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
		//Getting post data 

		$Delivery_Id = $_POST['Delivery_Id'];
		$Address = $_POST['Address'];
		$Contact = $_POST['Contact'];
		$Cust_Id = $_POST['Cust_Id'];
        $Order_Id=$_POST['Order_Id'];
		
		//checking if the received values are blank
		if($Delivery_Id == '' || $Address == '' || $Contact == '' || $Cust_Id == '' || $Order_Id == ''){
			//giving a message to fill all values if the values are blank
			echo 'please fill all values on home delivery of the customer';
		}else{
			//If the values are not blank
			//Connecting to our database by calling dbConnect script 
			require_once('dbconnect.php');
			
							
				//If username is not already exist 
				//Creating insert query 
				$sql = "INSERT INTO restaurant (Delivery_Id, Address, Contact, Cust_Id, Order_Id) VALUES('$r_name', '$Delivery_Id', '$Address', '$Contact', '$Cust_Id', '$Order_Id')";
				
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