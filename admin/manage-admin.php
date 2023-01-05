<?php include('partials/menu.php ') ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1> MANAGE ADMIN</h1>
    <br /> <br /> <br />

    <?php

    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']); //Removing session message
    }

    if (isset($_SESSION['delete'])){
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    ?>
    <br>

    <!-- Button to Add Admin -->
    <button class="btn-primary">
      <a href="./add-admin.php">Add Admin</a>
    </button>
    <br /> <br /> <br />

    <!-- Table to diplay  All admins in the D.B -->
    <table class="tbl-full">
      <tr>
        <th>#</th>
        <th>Full name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <?php
      // Query to get all admin
        $sql = "SELECT * FROM tbl_admin";

      //Execute the query
      $res = mysqli_query($conn, $sql);

      //Check whether query is executed
      if($res == TRUE)
      {
        //Count rows
        $count= mysqli_num_rows($res); // Function to count all the rows in a DB

        $sn = 1;  //will be used to display the serial numbers of the fetched data

        if($count > 0)
        {
          while($rows=mysqli_fetch_assoc($res))
          {
            //Using while loop to get all the data from the database.
            $id=$rows['id'];
            $full_name=$rows['full_name'];
            $username=$rows['username'];
            
            //Display the data in our table
            ?>

            <tr>
              <td><?php echo $sn++;?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username?></td>
              <td>
                <button class="btn-secondary" id="update-admin-btn">
                  <a href="<?php echo HOMEURL;?>admin/update-admin.php?id=<?php echo $id;?>">Update admin</a>
                </button>
                <button class="btn-danger">
                  <a href="<?php echo HOMEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>">Delete admin</a>
                </button>
              </td>
            </tr>

            <?php
          }
        }
        else
        {

        }

      }
      
      ?>
    </table>

  </div>
</div>
<!-- Main section ends -->

<?php include('./partials/footer.php') ?>