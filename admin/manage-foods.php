<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1> MANAGE FOODS</h1>
    <br /> <br /> <br />

    <!-- Button to Add Admin -->
    <button class="btn-primary">
      <a href="<?php echo HOMEURL ?>admin/add-food.php">Add Food</a>
    </button>
    <br /> <br /> <br />

    <?php

    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>

    <!-- Table to diplay  All admins in the D.B -->
    <table class="tbl-full">
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>

      <?php
      //fetch food from the database
      $sql = "SELECT * FROM tbl_food";

      $res = mysqli_query($conn, $sql);

      $count = mysqli_num_rows($res);

      //Serial number handling
      $sn = 1;

      if ($count > 0) {
        //Get the food from the data base and display
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];
      ?>
          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $price; ?></td>
            <td>
              <?php
              //Check whether we have an image or not
              if ($image_name == "") {
                echo "<div class='error'>Image not Added.</div>";
              } else {
              ?>
                <img src="<?php echo HOMEURL ?>images/food/<?php echo $image_name ?>" width="100px">
              <?php
              }
              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <button class="btn-secondary" id="update-admin-btn">
                <a href="#">Update Food</a>
              </button>
              <button class="btn-danger">
                <a href="#">Delete Food</a>
              </button>
            </td>
          </tr>

      <?php
        }
      } else {
        echo "<tr><td colspan='7' class='error'>Food not Added yet.</td></tr>";
      }
      ?>
    </table>
  </div>
</div>
<!-- Main section ends -->

<?php include('partials/footer.php') ?>