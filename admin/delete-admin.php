<?php
  include('./config/constants.php');

  //1.Get the ID of Admin to be deleted. 
  $id = $_GET['id'];

  //2.Creatr SQL querry to delete admin
  $sql = "DELETE FROM tbl_admin WHERE id=$id";

  //Execute the query
  $res = mysqli_query($conn, $sql);

  //Check whether the query executes successfully and admin deleted/
  if($res==TRUE)
  { //create a session variable to display the message
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";  
    header('location:'.HOMEURL.'admin/manage-admin.php');
  }
  else
  {
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try Again Later.</div>";
    header('location:'.HOMEURL.'admin/manage-admin.php');
  }
  //3.Redirect to manage admin page with message(success/error)
