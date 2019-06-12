<?php
 //Change the values according to your database
 
 /* this will allow the project to connect to the db */

 define('HOST','dbhost_name');
 define('USER','db_user');
 define('PASS','db_password');
 define('DB','db_database');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

?>