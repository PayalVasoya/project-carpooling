<?php
  require_once('includes/connection.php');
  session_start();
  $city_id=$_GET['city_id'];
  if(isset($_POST['edit_city']))
  {
    $city_name = $_POST['city_nm'];
    $upd="update tbl_cities set city_name='$city_name' where city_id='$city_id'";
    $query =mysqli_query($conn,$upd);
    if($query)
    {
      echo "<h3 align='center'>Updated successfully</h3>";
      header('Refresh:1,view-city.php');
      //header('Location: edit-brand.php');
    }
    else
    {
        echo "<h3 align='center'>Updated error</h3>";
        header('Refresh:1,edit-city.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | edit-city</title>

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
            <h1 class="m-0">Edit city</h1>
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
    <?php
          if(isset($_GET['city_id']))
          {
           $sql = "Select * from tbl_cities where city_id='$city_id'";
            $query =mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($query);
          }
        ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="city_nm" placeholder="City name" value="<?php echo $result['city_name']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="edit_city" value="Update City">
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
