<?php include('./partials/menu.php') ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>

    <br><br>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    ?>

    <br><br>

    <!-- Add category form starts here -->
    <form action="" method="POST" enctype="multipart/form-data">

      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" placeholder="Category Title">
          </td>
        </tr>

        <tr>
          <td>Select Image:</td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Featured:</td>
          <td>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No">No
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No">No
          </td>
        </tr>

        <tr>
          <td>
            <span></span>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
          </td>
        </tr>

      </table>

    </form>
    <!-- Add category form ends here -->

    <?php

    //check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];

      //foul proofing for the radio buttons
      if (isset($_POST['featured'])) {
        //get the value
        $featured = $_POST['featured'];
      } else {
        //set the default value
        $featured =  "No";
      }

      if (isset($_POST['active'])) {
        //get the value
        $active = $_POST['active'];
      } else {
        //set the default value
        $active =  "No";
      }

      //check whether the image is selected or not and set the value for image name accordingly
      // print_r($_FILES['image']); //remember echo cannot access an array, print_r however can.

      // die(); // kills something about print_r: Be sure to check it out

      if(isset($_FILES['image']['name']))
      {
        //To upload the image, we need the image name, the source path and the destination path
        $image_name = $_FILES['image']['name'];

        $source_path = $_FILES['image']['tmp_name'];
        
        $destination_path = "../images/category/".$image_name;

        //Upload the image
        $upload = move_uploaded_file($source_path, $destination_path);

        //check whether the image is uploaded or not:- if it's  not uploaded, we will stop the process and redirect with error message
        if($upload==false)
        {
          $_SESSION['upload'] = "<div class='error'>FAILED TO UPLOAD IMAGE</div>";
          header('location:'.HOMEURL.'admin/add-category.php');
          //stop the process
          die();
        }
        


      }
      else
      {
        //Don't upload the image and set the image value as blank
        $image_name = "";
      }

      //Create sql query to insert into the DB
      $sql = "INSERT INTO tbl_category SET
      title ='$title',
      image_name = '$image_name',
      featured = '$featured',
      active = '$active'
    ";

      //execute the query and save in DB
      $res = mysqli_query($conn, $sql);

      //check whether the query executed or not
      if ($res == true) {
        $_SESSION['add'] = "<div class = 'success'>Category successfully added.</div>";
        header('location:' . HOMEURL . 'admin/manage-category.php');
      } else {
        $_SESSION['add'] = "<div class = 'error'>Failed to add category</div>";
        header('location:' . HOMEURL . 'admin/add-category.php');
      }
    }

    ?>

  </div>
</div>

<?php include('./partials/footer.php') ?>