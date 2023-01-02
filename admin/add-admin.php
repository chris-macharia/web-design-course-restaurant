<?php include("./partials/menu.php"); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add admin</h1>

    <br><br>

    <form action="" method="POST">

      <table class="tbl-30">
        <tr>
          <td>Full Name: </td>
          <td>
            <input type="text" name="full_name" placeholder="Enter your name">
          </td>
        </tr>

        <tr>
          <td>Username: </td>
          <td>
            <input type="text" name="username" placeholder="Enter your username">
          </td>
        </tr>

        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" placeholder="Enter your password">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add admin" class="btn-secondary ">
          </td>
        </tr>

      </table>

    </form>
  </div>
</div>

<?php include("./partials/footer.php"); ?>

<?php
  //Process the value from Form and save it in DB

  // Check wherther the submit button is clicked
      if(isset($_POST['submit']))
  {
      // Button clicked
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);  //Password encryption with MD5

      
      //SQL querry to save the data into the database
      $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
      ";

      // Execute query and save data in db
      $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //create db connection
      $db_select = mysqli_select_db($conn, 'food-ordering-website') or die(mysqli_error()); //select DB 

      $res = mysqli_query($conn, $sql) or die(mysqli_error());
  }
?>
