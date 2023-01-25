<?php
  include('./config/constants.php');
  
  // destroy the session
  session_destroy(); //Unsets $_SESSION['user']

  //redirect to login page
  header('location:'.HOMEURL.'admin/login.php ')
?>