<?php

  //Start session
  session_start();

//Create constants to store non repeating values
define('HOMEURL', 'https://127.0.0.1/food-ordering-website/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-ordering-website');

$conn = mysqli_connect('localhost', 'root', '') or die/* (mysqli_error()) */; //create db connection
$db_select = mysqli_select_db($conn, 'food-ordering-website') or die/* (mysqli_error()) */; //select DB 

?>
