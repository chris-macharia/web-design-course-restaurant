<?php
include('./config/constants.php');


if (isset($_GET['id']) && isset($_GET['image_name'])) {
  //Get the ID and Image_name
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  //Remove the image if available
  //Check whether the image is available and delete only if available
  if ($image_name != "") {
    $path = "../images/food/" . $image_name;

    $remove = unlink($path);

    if ($remove == false) {
      $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
      header('location:' . HOMEURL . 'admin/manage-foods.php');
      die();
    }
  }

  //Delete from the database
  $sql = "DELETE FROM tbl_food WHERE id=$id";

  $res = mysqli_query($conn, $sql);

  if ($res == true) {
    $_SESSION['delete'] = "<div class='success'>Food deleted successfully</div>";
    header('location:' . HOMEURL . 'admin/manage-foods.php');
  } else {
    $_SESSION['delete'] = "<div class='error'>Failed to delete food</div>";
    header('location:' . HOMEURL . 'admin/manage-foods.php');
  }
} else {
  //Redirect to manage food page
  $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access.</div>";
  header('location:' . HOMEURL . 'admin/manage-foods.php');
}
