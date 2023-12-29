<?php
  require_once('includes/connection.php');

  session_start();

if(isset($_POST['signin'])){

   $email = $_POST['email'];

   $password = $_POST['password'];

    $query = "SELECT * FROM tbl_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user && ($password===$user['password']) ){
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['user_name'] = $user['user_name'];

        echo "<h3 align='center'>Login successfully!</h3>";
        header('Refresh:3,index.php');
        // exit;
    } else {
      echo "<h3 align='center'>Something is wrong!!</h3>";
      header('Refresh:3,signin.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | Signin</title>

  <?php require_once('includes/style.php');?>
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Main content -->
<div class="card card-outline card-primary">
  <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Auto</b>Route</a>
  </div>
    <div class="card-body">
        <form method="post">
    
            <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>

            

            <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <input type="submit" class="btn btn-primary btn-block" name="signin" value="SignIn">
          </div>
          <!-- /.col -->
        </div>
        </form>
    </div>
<!-- /.form-box -->
</div><!-- /.card -->
                

</div>

<?php
  // jquery
  require_once('includes/script.php')
?>
</body>
</html>
