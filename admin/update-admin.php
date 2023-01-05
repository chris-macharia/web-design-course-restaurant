<?php include('./partials/menu.php')?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Admin</h1>
    <br><br>

    <?php

    //1. Get the ID of the selected query
    $id = $_GET['id'];

    //2.Create sql querry
    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

    //Execute the querry
    $res = mysqli_query($conn, $sql);

    //Check whether the querry is executes or not
    if($res == TRUE)
    {
      // Check whether the data is available
      $count = mysqli_num_rows($res); 
      if($count==1)
      {
        $row = mysqli_fetch_assoc($res);

        $full_name = $row['full_name'];
        $username = $row['username'];
      }
      else 
      {
        //Redirect to Admin Page --> Very important when dealing with hackers incase valu is passed from url
        header('location:'.HOMEURL.'admin/manage-admin.php');
      }

      
    }


    ?>


    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full Name: </td>
          <td>
            <input type="text" name="full_name" value="<?php echo $full_name;?>">
          </td>
        </tr>

        <tr>
          <td>Username: </td>
          <td>
            <input type="text" name="username" value="<?php echo $username?>">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
          </td>

      </table>

    </form>



  </div>

</div>


<?php include('./partials/footer.php') ?>