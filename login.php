<?php
  require_once('includes/connection.php');

  session_start();

if(isset($_POST['login'])){

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
      header('Refresh:3,login.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once('includes/style.php');?>
</head>
<body>
    <?php require_once('includes/navbar.php')?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Login</h1>
          </div>
        </div>
      </div>
    </section>     
    <!-- content start -->
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-8 block-9 mb-md-5">
            <form class="bg-light p-5 contact-form" method="post">
              <div class="form-group">
                <input type="text" class="form-control"  name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              
              <div class="form-group">
                <input type="submit" value="signin" name="login" class="btn btn-primary py-3 px-5">
                <a href="register.php">create a new account </a>
              </div>
            </form>
          
          </div>
        </div>
        
      </div>
    </section>
    <!-- content end -->
    <?php require_once('includes/footer.php')?>
    <?php require_once('includes/script.php')?>
</body>
</html>