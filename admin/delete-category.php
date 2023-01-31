<?php
  include('./config/constants.php');

  //check whether the id and image_name is set or not
  if(isset($_GET['id']) &&  isset($_GET['image_name']))
  {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    
    //Remove the physical file if it exists
    if($image_name != "")
    {
      $path = "../images/category/".$image_name;

      //Remove the image
      $remove = unlink($path);
      if($remove==false)
      {
        $_SESSION['remove'] = "<div class='error'> Failed to remove category Image.</div>";
        header('location:'.HOMEURL.'admin/manage-category.php');
        die();
      }
    }

    //Delete data in the DB
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
      $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
      header('location:'.HOMEURL.'admin/manage-category.php');
    }
    else
    {
      $_SESSION['delete'] = "<div class='error'>Failed To Delete Category.</div>";
      header('location:'.HOMEURL.'admin/manage-category.php');
    }
  }
  else
  {
    header('location:'.HOMEURL.'admin/manage-category.php');
  }
?>