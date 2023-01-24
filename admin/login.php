<?php include('./config/constants.php'); ?>

<html>

<head>
  <title>Login - Food Order System</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <div class="login">
    <h1 class="text-center">Login</h1>
    <br>
    <br>

    <?php

    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }


    ?>
    <br>
    <br>
    <!-- login form starts here -->
    <form action="" method="POST" class="text-center">
      Username: <br>
      <input type="text" name="username" placeholder="Enter User Name"> <br><br>
      Password: <br>
      <input type="text" name="password" placeholder="Enter User Password"> <br>
      <br>
      <br>

      <input type="submit" name="submit" value="Login" class="btn-primary">

    </form>
    <br>
    <!-- login form ends here -->

    <p class="text-center">Created by <a href="#">Chris Macharia</a> </p>
  </div>

</body>

</html>

<?php

//check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
  // 1. Get the data from the login form
  $username = $_POST['username'];
  $password = md5($_POST['password']);


  //SQL to check whether the username and password exists or not
  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

  // 3. Execute the query
  $res = mysqli_query($conn, $sql);
  mysqli_num_rows($res);

  //4. count rows to check whether the user exists or not
  $count = mysqli_num_rows($res);

  if ($count == 1) {
    //user available and login success
    $_SESSION['login'] = "<div class='success'>Login Successful</div>";

    //Redirect to homepage
    header('location:' . HOMEURL . 'admin/');
  } else {
    // user not available and login fail
    $_SESSION['login'] = "<div class='error text-center'>Incorrect Username or Password </div>";

    //Redirect to homepage
    header('location:' . HOMEURL . 'admin/login.php');
  }
}

?>