<?php
  require_once('includes/connection.php');
  session_start();
  if(isset($_POST['register']))
  {
    $user_name = $_POST['user_name'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$user_type = $_POST['user_type'];
    $role_id = 2;


    $query1 = "SELECT * FROM `tbl_users` WHERE email = '".$email."'";

   $result1 = mysqli_query($conn, $query1);
   if(mysqli_num_rows($result1) > 0){

    echo "<h3 align='center'>user already exist!</h3>";
    header('Refresh:3,signup.php');

   }else{
    $query2 = "INSERT INTO `tbl_users`(user_name, mobile_no, email, password, role_id) VALUES('$user_name','$mobile_no','$email','$password','$role_id')";

         

    $result2 = mysqli_query($conn,$query2);

    if($query2){

        echo "<h3 align='center'>registered succesfully!</h3>";
        header('Refresh:3,login.php');
    }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php require_once('includes/style.php');?>
</head>
<body>
    <?php require_once('includes/navbar.php')?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Register</h1>
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
                <input type="text" class="form-control" placeholder="Your user name" name="user_name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your mobileno" name="mobile_no">
            </div>
            
              
              <div class="form-group">
                <input type="submit" value="signup" name="register" class="btn btn-primary py-3 px-5">
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