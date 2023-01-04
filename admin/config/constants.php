<?php

//Create constants to store non repeating values
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-ordering-website');

$conn = mysqli_connect('localhost', 'root', '') or die/* (mysqli_error()) */; //create db connection
$db_select = mysqli_select_db($conn, 'food-ordering-website') or die/* (mysqli_error()) */; //select DB 

?>
