<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1> MANAGE CATEGORY</h1>

    <br /> <br /> <br />

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>

    <br /> <br /> <br />

    <!-- Button to Add Admin -->
    <button class="btn-primary">
      <a href="<?php echo HOMEURL ?>admin/add-category.php">Add category</a>
    </button>

    <br /> <br /> <br />

    <!-- Table to diplay  All admins in the D.B -->
    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>

      <?php

      $sql = "SELECT * FROM tbl_category";

      $res = mysqli_query($conn, $sql);

      $count = mysqli_num_rows($res);

      $sn = 1; //Create a serial number generator

      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];

      ?>

          <tr>
            <td><?php echo $sn++ ?>.</td>
            <td><?php echo $title; ?></td>

            <td>
              <?php
              if ($image_name != "") {
                //Display the image
              ?>

                <img src="<?php echo HOMEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" alt="">

              <?php

              } else {
                //Display the message
                echo "<div class='error'> Image not Added.</div>";
              }
              ?>
            </td>


            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <button class="btn-secondary" id="update-admin-btn">
                <a href="#">Update category</a>
              </button>
              <button class="btn-danger">
                <a href="#">Delete category</a>
              </button>
            </td>
          </tr>

        <?php

        }
      } else {
        //We do not have data in the table - we'll display the message inside the table
        ?>

        <tr>
          <td colspan="6">
            <div class="error">No Category Added. </div>
          </td>
        </tr>

      <?php
      }
      ?>


    </table>
  </div>
</div>
<!-- Main section ends -->

<?php include('partials/footer.php') ?>