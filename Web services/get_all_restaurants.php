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
 $stmt = $conn->prepare("SELECT rid,r_name,r_location,r_phone,r_opening_Closing_Time,r_website,r_email, r_details, r_image, r_latitude,r_longitude FROM restaurant;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($rid,$r_name,$r_location,$r_phone,$r_opening_Closing_Time,$r_website,$r_email, $r_details, $r_image, $r_latitude,$r_longitude);
 
 $restaurants = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['rid'] = $rid; 
 $temp['r_name'] = $r_name; 
 $temp['r_location'] = $r_location; 
 $temp['r_phone'] = $r_phone; 
 $temp['r_opening_Closing_Time'] = $r_opening_Closing_Time; 
 $temp['r_website'] = $r_website; 
 $temp['r_email'] = $r_email; 
 $temp['r_details'] = $r_details; 
 $temp['r_image'] = $r_image; 
 $temp['r_latitude'] = $r_latitude; 
 $temp['r_longitude'] = $r_longitude; 
 array_push($restaurants, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($restaurants);

?>