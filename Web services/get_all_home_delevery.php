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
 $stmt = $conn->prepare("SELECT Delivery_Id, Address, Contact, Cust_Id, Order_Id FROM HOME_DELIVERY;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($Delivery_Id, $Address, $Contact, $Cust_Id, $Order_Id);
 
 $homedeliveries = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['Delivery_Id'] = $Delivery_Id; 
 $temp['Address'] = $Address; 
 $temp['Contact'] = $Contact; 
 $temp['Cust_Id'] = $Cust_Id; 
 $temp['Order_Id'] = $Order_Id; 

 array_push($homedeliveries, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($homedeliveries);

?>