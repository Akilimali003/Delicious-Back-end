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
 $stmt = $conn->prepare("SELECT food_id, food_name,food_desc,food_price,food_img,food_cat,rid FROM foods;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($food_id, $food_name, $food_desc, $food_price, $food_img, $food_cat, $rid);
 
 $foods = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['food_id'] = $food_id; 
 $temp['food_name'] = $food_name; 
 $temp['food_desc'] = $food_desc; 
 $temp['food_price'] = $food_price; 
 $temp['food_img'] = $food_img; 
 $temp['food_cat'] = $food_cat; 
 $temp['rid'] = $rid; 

 array_push($foods, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($foods);

?>