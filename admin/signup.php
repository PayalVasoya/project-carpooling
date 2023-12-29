<?php
  require_once('includes/connection.php');
  session_start();
  if(isset($_POST['signup']))
  {
    $user_name = $_POST['user_name'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$user_type = $_POST['user_type'];
    $role_id = $_POST['role_id'];


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
        header('Refresh:3,signin.php');
    }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | Signup</title>

  <?php require_once('includes/style.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
<!-- navbar start -->
<?php 
// top navigation
  require_once('includes/header.php');
  // side navigation
  require_once('includes/sidebar.php');
?>
<!-- navbar end -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="index.php" class="h1"><b>Auto</b>Route</a>
          </div>
          <div class="card-body">
            <form method="post">
            <div class="input-group mb-3">
          <input type="text" class="form-control" name="user_name" placeholder="User name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="mobile_no" placeholder="Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
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
        <div class="form-group">
          <label>UserType</label>
          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="role_id">
          <option selected="selected" disabled >Select user type</option>
            <?php
              //fetch the roles table record.
              $sql = "select * from tbl_roles";
              $result1 = mysqli_query($conn,$sql);

              while($row1=mysqli_fetch_array($result1))
              {
            ?>
              <option value="<?php echo $row1['role_id'];?>"><?php echo $row1['role_name'];?></option>
            <?php
              }
            ?>
          </select>
        </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                  <input type="submit" class="btn btn-primary btn-block" name="signup" value="SignUp">
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
  // footer
  require_once('includes/footer.php');
 ?>

</div>
<!-- ./wrapper -->

<?php
  // jquery
  require_once('includes/script.php')
?>
</body>
</html>
