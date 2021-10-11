<?php 
 
 
 //database constants
 define('DB_HOST','dbhost_name');
 define('DB_USERNAME','db_user');
 define('DB_PASSWORD','db_password');
 define('DB_NAME','db_database');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT id, c_name, c_contact, c_email FROM customer;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id, $c_name, $c_contact, $c_email );
 
 $customers = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id'] = $id; 
 $temp['c_name'] = $c_name; 
 $temp['c_contact'] = $c_contact; 
 $temp['c_email'] = $c_email; 

 array_push($customers, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($customers);

?>