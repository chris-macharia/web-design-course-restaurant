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
    ?>

    <br><br>

    <!-- Add category form starts here -->
    <form action="" method="POST">

      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" placeholder="Category Title">
          </td>
        </tr>

        <tr>
          <td>Featured:</td>
          <td>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="N">No
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

      //Create sql query to insert into the DB
      $sql = "INSERT INTO tbl_category SET
      title ='$title',
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