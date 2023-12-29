<?php
require_once('includes/connection.php');
session_start();

if(strlen($_SESSION['user_id'])==0)
{
    header('location:index.php');
}
else{
  if(isset($_GET['eid']))
	{
    $eid=$_GET['eid'];
    $status=2;
    $sql1 = "UPDATE tbl_booking SET status='".$status."' WHERE  book_id='".$eid."'";
    $query1 = mysqli_query($conn,$sql1);

    if($query1)
        {
          echo "<h3 align='center'>Booking Cancelled Successfully</h3>";
          header('Refresh:3,new-booking.php');
        }
        else
        {
          echo("Something is wrong " . $mysqli -> error);
        }
    
  }
  if(isset($_GET['aeid']))
	{
    $aeid=intval($_GET['aeid']);
    $status=1;

    $sql2 = "UPDATE tbl_booking SET status='".$status."' WHERE book_id='".$aeid."'";
    $query2 = mysqli_query($conn,$sql2);
    if($query2)
        {
          echo "<h3 align='center'>Booking Successfully Confirmed</h3>";
          header('Refresh:3,new-booking.php');
        }
        else
        {
          echo("Something is wrong " . $mysqli -> error);
        }

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | New Booking</title>

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
            <h1 class="m-0">View Booking List</h1>
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
                      <th>UserName</th>
                      <th>Modelno</th>
                      <th>from_date</th>
                      <th>to_date</th>
                      <th>message</th>
                      <th>Pickup/Time</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT b.*, au.auto_id, au.model_no,
                    u.user_name, u.user_id
                    FROM tbl_booking b
                    JOIN tbl_auto au ON b.auto_id = au.auto_id
                    JOIN tbl_users u ON b.user_id = u.user_id";
            
                    //$sql = "SELECT * FROM tbl_auto";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query))
                    {
                    ?>
                    <tr>
                      <td><?php echo $row['book_id'];?></td>
                      <td><?php echo $row['user_name'];?></td>
                      <td><?php echo $row['model_no'];?></td>
                      <td><?php echo $row['from_date'];?></td>
                      <td><?php echo $row['to_date'];?></td>
                      <td><?php echo $row['message'];?></td>
                      <td><?php echo $row['pickup_time'];?></td>
                      <td>
                      <?php
if($row['status']==1)
{
  echo 'Confirmed';

} else if ($row['status']==2) {
  echo 'Cancelled';
}
 else{
  echo 'Not Confirmed yet';

 }
										?>    
                    
                    </td>

                      <td colspan=2>
                        <a href="new-booking.php?aeid=<?php echo $row['book_id'];?>" onclick="return confirm('Do you really want to Confirm this booking')">
                          Confirm
                        </a>/
                        <a href="new-booking.php?eid=<?php echo $row['book_id'];?>" onclick="return confirm('Do you really want to Cancel this Booking')">
                          Cancle
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
