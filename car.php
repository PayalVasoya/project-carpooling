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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('includes/style.php');?>
</head>
<body>
    <?php require_once('includes/navbar.php')?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>auto rickshaw <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">AutoRickshaw</h1>
          </div>
        </div>
      </div>
    </section>    
    <!-- content start -->
    <section class="ftco-section bg-light">
    	<div class="container">

    		<div class="row">
			<?php
        	while($row = mysqli_fetch_assoc($query))
            {
        ?>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(admin/<?php echo $row['auto_img']?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="auto-single?id=<?php echo $row['brand_id'];?>.php"><?php echo $row['brand_name']?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo $row['model_no']?></span>
	    						<p class="price ml-auto">Rs.&nbsp;<?php echo $row['rent_per_hour']?> <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="make-my-trip.php?id=<?php echo $row['auto_id']?>" class="btn btn-secondary py-2 ml-1" class="btn btn-primary py-2 mr-1">Book now</a> <a href="auto-single.php?id=<?php echo $row['auto_id']?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

				<?php
			}
		?>
    		</div>
		
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    	</section>
    <!-- content end -->
    <?php require_once('includes/footer.php')?>
    <?php require_once('includes/script.php')?>
</body>
</html>