<?php include('./partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Category</h1>

    <br><br>

    <?php

    //Check whether the id is set or not
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM tbl_category WHERE id=$id";

      $res = mysqli_query($conn, $sql);

      $count = mysqli_num_rows($res);

      if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
      } else {
        $_SESSION['no-category-found'] = "<div class='error'>Category not found </div>";
        header('location:' . HOMEURL . 'admin/manage-category.php');
      }
    } else {
      header('location:' . HOMEURL . "admin/manage-category.php");
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" value="<?php echo $title; ?>">
          </td>
        </tr>

        <tr>
          <td>Current Image: </td>
          <td>
            <?php

            if ($current_image != "") {
              //Display image
            ?>
              <img src="<?php echo HOMEURL ?>images/category/<?php echo $current_image; ?>" width="150px">
            <?php
            } else {
              //Display message
              echo "<div class='error'>Image not added.</div>";
            }
            ?>
          </td>
        </tr>

        <tr>
          <td>New Image: </td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Featured: </td>
          <td>
            <!-- The php code is used to display checked and unchecked radio buttons -->
            <input <?php if ($featured == "Yes") {
                      echo "checked";
                    } ?> type="radio" name="featured" value="Yes">Yes
            <input <?php if ($featured == "No") {
                      echo "checked";
                    } ?> type="radio" name="featured" value="No">No
          </td>
        </tr>


        <tr>
          <td>Active:</td>
          <td>
            <input <?php if ($active == "Yes") {
                      echo "checked";
                    } ?> type="radio" name="active" value="Yes">Yes
            <input <?php if ($active == "No") {
                      echo "checked";
                    } ?> type="radio" name="active" value="No">No
          </td>
        </tr>

        <tr>
          <td>
            <input type="hidden" name="current_image" value="<?php echo "$current_image"; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="update category" class="btn-secondary">
          </td>
        </tr>
      </table>
    </form>

    <?php

    if (isset($_POST['submit'])) {
      var_dump($_POST);
      //Get all the values from our form
      $id = $_POST['id'];
      $title = $_POST['title'];
      $current_image = $_POST['current_image'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      //Updating new image if selected


      //Updating the DB
      $sql2 = "UPDATE tbl_category SET 
        title='$title',
        featured='$featured',
        active='$active'
        WHERE id=$id
      ";

      $res2 = mysqli_query($conn, $sql2);

      //Redirect to manage category with message.
      if ($res2 == true) {
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
        header('location:' . HOMEURL . 'admin/manage-category.php');
      } else {
        $_SESSION['update'] = "<div class='error'>Failed to update category</div>";
        header('location:' . HOMEURL . 'admin/manage-category.php');
      }
    }

    ?>


  </div>
</div>

<?php include('./partials/footer.php'); ?>