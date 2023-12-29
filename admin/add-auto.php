<?php
  require_once('includes/connection.php');

  session_start();
  
  if(isset($_POST['add_auto']))
  {
    $auto_title = $_POST['auto_title'];
    $brand_id = $_POST['brand_id'];
    $fule_id = $_POST['fule_id'];
    $transmission_id = $_POST['transmission_id'];
    $seats = $_POST['seats'];
    $model_no = $_POST['model_no'];
    $descriptions = $_POST['descriptions'];
    // $accessories = $_POST['accessories'];

    // upload images
    $auto_img = $_FILES['auto_img']['name'];

    $image_tmp_name = $_FILES['auto_img']['tmp_name'];
 
    $image_size = $_FILES['auto_img']['size'];
 
    $path = 'uploads/auto/'.$auto_img;
 
    // $avability_status = $_POST['avability_status'];
    $rent_per_hour = $_POST['rent_per_hour'];

   $sql = "Insert Into tbl_auto (auto_title,brand_id,fule_id,transmission_id,seats,model_no,descriptions,auto_img,rent_per_hour) values ('$auto_title','$brand_id','$fule_id','$transmission_id','$seats','$model_no','$descriptions','$path','$rent_per_hour')";
    $query =mysqli_query($conn,$sql);
    if($query)
    {
      move_uploaded_file($image_tmp_name, $path);
      echo "<h3 align='center'>Insert successfully</h3>";
      header('Refresh:3,add-auto.php');
      //header('Location: add-brand.php');
    }
    else
    {
      echo("Something is wrong " . $mysqli -> error);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AutoRoute | Auto Rickshaw</title>

  <?php require_once('includes/style.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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
            <h1 class="m-0">Add 3 Wheeler/Auto Rickshaw</h1>
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
            <form method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="auto_title" placeholder="Enter auto title">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-book"></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Brand Id</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="brand_id">
              <option selected="selected" disabled>Select brand</option>
                <?php
                  //fetch the roles table record.
                  $sql = "select * from tbl_brands";
                  $result1 = mysqli_query($conn,$sql);

                  while($row1=mysqli_fetch_array($result1))
                  {
                ?>
                  <option value="<?php echo $row1['brand_id'];?>"><?php echo $row1['brand_name'];?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Fule Id</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="fule_id">
              <option selected="selected" disabled>Select fule</option>
                <?php
                  //fetch the roles table record.
                  $sql = "select * from tbl_fule_types";
                  $result1 = mysqli_query($conn,$sql);
                      
                  while($row1=mysqli_fetch_array($result1))
                  {
                ?>
                  <option value="<?php echo $row1['fule_id'];?>"><?php echo $row1['fule_name'];?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Transmission Id</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="transmission_id">
              <option selected="selected" disabled>Select transmission type</option>

                <?php
                  //fetch the roles table record.
                  $sql = "select * from tbl_transmission_type";
                  $result2 = mysqli_query($conn,$sql);
                      
                  while($row2=mysqli_fetch_array($result2))
                  {
                ?>
                  <option value="<?php echo $row2['transmission_id'];?>"><?php echo $row2['transmission_name'];?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="input-group mb-3">
                <input type="number" class="form-control" name="seats" placeholder="Select number of seats">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="model_no" placeholder="Enter auto model no">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="descriptions" placeholder="Enter descriptions">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- <div class="input-group mb-3">
          <input type="text" class="form-control" name="accessories" placeholder="Enter accessories">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> -->

        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="auto_img" name="auto_img" accept="image/jpg, image/png, image/jpeg">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>

        <!-- <div class="input-group mb-3">
          <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="avability_status" name="avability_status">
              <label for="customCheckbox1" class="custom-control-label">avability_status</label>
          </div>
        </div>  -->

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="rent_per_hour" placeholder="Enter Rent per hour">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 

            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                  <input type="submit" class="btn btn-primary btn-block" name="add_auto" value="Add AutoRickshaw">
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
