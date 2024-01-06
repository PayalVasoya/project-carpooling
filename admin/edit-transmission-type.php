<?php
  require_once('includes/connection.php');
  session_start();
  
  $id = $_GET['id'];
  if(isset($_POST['edit_transmisson'])){
    $transmission_name=$_POST['transmission_name'];
    $upd="update tbl_transmission_type set transmission_name='$transmission_name' where transmission_id='$id'";
    $query = mysqli_query($conn,$upd);
    if($query){
        echo "<h3 align='center'>Updated successfully</h3>";
        header('Refresh:1,view-transmission.php');
    }else{
        echo "<h3 align='center'>Updated error</h3>";
        header('Refresh:1,edit-transmission-type.php');

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | edit-transmissin type</title>

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
            <h1 class="m-0">Edit transmission type</h1>
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
          if(isset($_GET['id']))
          {
           $sql = "Select * from tbl_transmission_type where transmission_id='$id'";
            $query =mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($query);
          }
        ?>
      <form method="post">
        <div class="input-group mb-3">
          <div class="custom-control custom-radio ml-1">
              <input class="custom-control-input" type="radio" id="customRadio1" name="transmission_name" value="gear" <?php echo ($result['transmission_name']=='gear')?'checked':'' ?>>
              <label for="customRadio1" class="custom-control-label">gear</label>
          </div>

          <div class="custom-control custom-radio ml-3">
            <input class="custom-control-input" type="radio" id="customRadio2" name="transmission_name" value="gearless" <?php echo ($result['transmission_name']=='gearless')?'checked':'' ?>>
            <label for="customRadio2" class="custom-control-label">gearless</label>
          </div>
        </div>
       
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="edit_transmisson" value="Update Transmission">
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
