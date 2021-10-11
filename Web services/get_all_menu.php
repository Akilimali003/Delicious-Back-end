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
 $stmt = $conn->prepare("SELECT Menu_id, Name, Price, Type, Category, rid FROM menu;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($Menu_id, $Name, $Price, $Type, $Category, $rid);
 
 $menus = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['Menu_id'] = $Menu_id; 
 $temp['Name'] = $Name; 
 $temp['Price'] = $Price; 
 $temp['Type'] = $Type; 
 $temp['Category'] = $Category; 
 $temp['rid'] = $rid; 

 array_push($menus, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($menus);

?>