<?php
require_once('includes/connection.php');
session_start();
$sql = "SELECT au.*, b.brand_id, b.brand_name, f.fule_id, f.fule_name, t.transmission_id, t.transmission_name FROM tbl_auto au 
        JOIN tbl_brands b ON au.brand_id = b.brand_id
        JOIN tbl_fule_types f ON au.fule_id=f.fule_id
        JOIN tbl_transmission_type t ON au.transmission_id=t.transmission_id";
//$sql = "SELECT * FROM tbl_auto";
$query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | view-auto</title>

  <?php require_once('includes/style.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
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
            <h1 class="m-0">View auto</h1>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 c lass="card-title">Bordered Table</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>BrandName</th>
                      <th>FuleName</th>
                      <th>TransmissionName</th>
                      <th>Seats</th>
                      <th>ModelNo</th>
                      <th>Descriptions</th>
                      <th>Image</th>
                      <th>AvabilityStatus</th>
                      <th>Rent/hr</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($query))
                    {
                    ?>
                    <tr>
                      <td><?php echo $row['auto_id'];?></td>
                      <td><?php echo $row['brand_name'];?></td>
                      <td><?php echo $row['fule_name'];?></td>
                      <td><?php echo $row['transmission_name'];?></td>
                      <td><?php echo $row['seats'];?></td>
                      <td><?php echo $row['model_no'];?></td>
                      <td><?php echo $row['descriptions'];?></td>
                      <td><img src="<?php echo $row['auto_img'];?>" width="100px" height="100px"></td>
                      <td><?php echo $row['avability_status'];?></td>
                      <td><?php echo $row['rent_per_hour'];?></td>
                      <td colspan="2">
                        <a  href="<?php echo $row['auto_id'];?>">
                          <i class="fas fa-edit"></i>
                        </a>|
                        <a  href="<?php echo $row['auto_id'];?>">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
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
