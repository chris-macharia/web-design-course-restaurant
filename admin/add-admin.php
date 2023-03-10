<?php include("./partials/menu.php"); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add admin</h1>

    <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    
    ?>
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

//1.Check wherther the submit button is clicked
if (isset($_POST['submit'])) {
  //Button clicked
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);  //Password encryption with MD5


  //2.SQL querry to save the data into the database
  $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
      ";

  //3.Execute the querry and save the data into the DB
  $res = mysqli_query($conn, $sql) or die/* (mysqli_error()) */;

  //4.Check whether the data is saved in the DB
  if($res==TRUE)
  {
    //Create a session variable to display message
    $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
    //Redirect page
    header("location:".HOMEURL.'admin/manage-admin.php');
  }
  else
  {
    //Create a session variable to display message
    $_SESSION['add'] = "<div class='error'>Failed To Add Admin</div>";
    //Redirect page
    header("location:".HOMEURL.'admin/manage-admin.php');
  }


}
?>